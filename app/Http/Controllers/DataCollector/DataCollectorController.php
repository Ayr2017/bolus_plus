<?php

namespace App\Http\Controllers\DataCollector;

use App\Http\Controllers\Controller;
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
        // Сделаем GET-запрос к микросервису
        $response = $this->client->get('http://data_collector:8080/');

        // Получим тело ответа
        return $response->getBody()->getContents();
    }
}
