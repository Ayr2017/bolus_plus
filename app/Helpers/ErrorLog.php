<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class ErrorLog
{
    public static function write(string $method, int $line, string $errorMessage, \Throwable|\Exception $exception = null) : void
    {
        if($exception){
            Log::error('Exception: ',[
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ]);
        } else {
            Log::error("$method $line : $errorMessage");
        }
    }
}
