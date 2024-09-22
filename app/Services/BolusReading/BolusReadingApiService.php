<?php

namespace App\Services\BolusReading;

use AllowDynamicProperties;
use App\Models\BolusReading;
use \App\Services\Service;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

#[AllowDynamicProperties] class BolusReadingApiService extends Service
{
    public function __construct()
    {
        parent::__construct();
        $this->url = config('api.url');
        $this->login = config('api.login');
        $this->password = config('api.password');
    }

    /**
     * @throws ConnectionException
     */
    public function auth(): void
    {
        \Laravel\Prompts\info('start auth');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
            ->post($this->url . '/auth/login', [
                'login' => $this->login,
                'password' => $this->password,
                'credentials' => base64_encode($this->login . ':' . $this->password),
            ]);
        $this->cookie = ($response->json())['result'];
        session()->put('token', $this->cookie);

    }

    /**
     * @throws ConnectionException
     */
    public function getReadings($deviceNumber)
    {

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Cookie' => session('token', null),
        ])->get($this->url . '/record/all?deviceId=' . $deviceNumber);

        if ($response->json()['state'] == 'FAULT') {
            \Laravel\Prompts\info('FAULT');

            $this->auth();
            $this->getReadings($deviceNumber);
        }
        return $response->json();
    }

    /**
     * @throws ConnectionException
     */
    public function pullRecords($deviceNumber): void
    {
        $readingsArray = $this->getReadings($deviceNumber);
        if ($readingsArray['state'] != 'OK') {
            \Laravel\Prompts\info('failed');
        }
        $results = $readingsArray['result'];
        foreach ($results as $key => $result) {
            $code = $result['code'];
            foreach ($result['records'] as $record) {
                try {
                    preg_match('/^-?\d+(\.\d{1,2})?/', $record['value'], $matches);

                    $reading = BolusReading::updateOrCreate([
                        'device_number' => $deviceNumber,
                        'date' => $record['date'],
                    ], [
                        $code => floatval($matches[0]),
                    ]);
                } catch (\Exception $exception) {
                    Log::error( __METHOD__." ". $exception->getMessage());
                }
            }
        }


    }
}
