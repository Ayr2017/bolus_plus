<?php

namespace App\Services\BolusReading;

use AllowDynamicProperties;
use App\Models\BolusReading;
use \App\Services\Service;
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

    public function auth()
    {
        Log::info('start auth');
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
        Log::info('token: ' . $this->cookie);
        Log::info('token s: ' . session('token'));

    }

    public function getReadings($deviceNumber)
    {
        Log::info('start getReadings');

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Cookie' => session('token', null),
        ])->get($this->url . '/record/all?deviceId=' . $deviceNumber);

        if ($response->json()['state'] == 'FAULT') {
            Log::info('FAULT');

            $this->auth();
            $this->getReadings('37a022f5-0dc9-4936-aac7-1da036eef6a1');
        }
        Log::info('result : ', $response->json());
        return $response->json();
    }

    public function pullRecords($deviceNumber)
    {
        $readingsArray = $this->getReadings($deviceNumber);
        if ($readingsArray['state'] != 'OK') {
            dump('failed');
        }


        $results = $readingsArray['result'];
        foreach ($results as $key => $result) {
            $code = $result['code'];
            foreach ($result['records'] as $record) {
                try {
                    preg_match('/^-?\d+(\.\d{1,2})?/', $record['value'], $matches);
//                    if($code == 'VB'){
//                        dd(floatval($matches[0]));
//                    }
                    BolusReading::updateOrCreate([
                        'device_number' => $deviceNumber,
                        'date' => $record['date'],
                    ], [
                        'date' => $record['date'],
                        'device_number' => $deviceNumber,
                        $code => floatval($matches[0]),
                    ]);
                } catch (\Exception $exception) {
                    dd( $record, $exception->getMessage());
                }
            }
        }


    }
}
