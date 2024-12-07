<?php

namespace App\Domains\Telegram;


use AllowDynamicProperties;
use Illuminate\Support\Facades\Config;

/**
 * Class TelegramChat
 *
 * /**
 * Class TelegramChat
 *
 * @package App\Domains\Telegram
 * @property string $id
 *
 */

#[AllowDynamicProperties] class TelegramChat
{
    public function __construct($chatId)
    {
        $this->id = $chatId;
    }
}
