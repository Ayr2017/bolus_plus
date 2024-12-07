<?php

namespace App\Domains\Telegram;

use App\Domains\OpenAi\ChatGpt;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramBot
{
    private string $botToken;
    public function __construct()
    {
        $this->botToken = Config::get('telegram.bot_token');
    }

    public function sendMessage(string $message): void
    {

        $response = Http::get('https://api.telegram.org/bot' . $this->botToken . '/sendMessage', [
            'chat_id' => $this->groupChat()->id,
            'text' => $message,
        ]);
    }

    public function groupChat(): TelegramChat
    {
        return new TelegramChat(Config::get('telegram.group_chat_id'));
    }

    /**
     * @return ChatGpt
     */
    public function chatGpt(): ChatGpt
    {
        return new ChatGpt();
    }
}
