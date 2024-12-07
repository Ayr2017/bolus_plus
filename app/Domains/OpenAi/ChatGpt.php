<?php

namespace App\Domains\OpenAi;


use AllowDynamicProperties;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

#[AllowDynamicProperties] class ChatGpt
{
    /**
     * @property $key string
     *
     **/

    public function __construct()
    {
        $this->key = Config::get('open-ai.key');
    }

    /**
     * @throws ConnectionException
     */
    function getChatGPTResponse($message)
    {
        // Формируем запрос с заголовками и телом
        $response = Http::withHeaders([
            'Authorization' => "Bearer $this->key",
            'Content-Type'  => 'application/json',
        ])->post("https://api.openai.com/v1/chat/completions", [
            'model'    => 'gpt-3.5-turbo', // Или 'gpt-4'
            'messages' => [
                ['role' => 'user', 'content' => $message]
            ]
        ]);

        // Проверяем статус ответа
        if ($response->failed()) {
            dump($response->json()); // Выводим тело ответа для отладки
            return 'Ошибка при запросе к ChatGPT.';
        }

        $data = $response->json(); // Получаем массив из JSON-ответа
        return $data['choices'][0]['message']['content'] ?? 'Не удалось получить ответ от ChatGPT.';
    }
}
