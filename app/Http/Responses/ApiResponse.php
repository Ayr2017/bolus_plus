<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data, $message = 'Success', $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'error' => null
        ], $status);
    }

    public static function error($error, $message = 'Error', $status = 400): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => null,
            'errors' => $error
        ], $status);
    }
}
