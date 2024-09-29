<?php

namespace App\Http\Controllers\DataCollector;

use App\Http\Controllers\Controller;
use App\Models\BolusReading;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DataCollectorController extends Controller
{
    protected Client $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function test()
    {
//        return BolusReading::query()
//            ->with(['bolus'])
//            ->select(['id','date','device_number','rssi','ut'])->get()->toJson();
        // Сделаем GET-запрос к микросервису
        $response = $this->client->get('http://datacollector:8080/endpoint');

        // Получим тело ответа
        return $response->getBody()->getContents();
    }
}
