<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ErrorLog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sanctum\CreateTokenRequest;
use App\Http\Responses\ApiResponse;
use App\Services\Sanctum\SanctumService;
use Illuminate\Http\JsonResponse;

class SanctumController extends Controller
{
    public function createToken(CreateTokenRequest $request, SanctumService $sanctumService): JsonResponse
    {
        try {
            $token = $sanctumService->createToken($request->validated());
            return ApiResponse::success(['token' => $token]);
        } catch (\Throwable $throwable) {
            ErrorLog::write(__METHOD__, __LINE__, $throwable->getMessage());
        }

        return ApiResponse::error('Something went wrong');
    }
}
