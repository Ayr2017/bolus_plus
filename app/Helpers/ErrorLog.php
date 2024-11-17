<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class ErrorLog
{
    public static function write(string $method, int $line, string $errorMessage) : void
    {
        Log::error("$method $line : $errorMessage");
    }
}
