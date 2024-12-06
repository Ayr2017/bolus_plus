<?php

namespace App\Domains\TeamLeadBot;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class TeamLead
{
    private string $botToken;
    public function __construct()
    {
        $this->botToken = Config::get('telegram.bot_token');
    }

    public function sendMessage(string $message)
    {
        Http::post('https://api.telegram.org/bot' . $this->botToken . '/sendMessage', []);
    }
}
