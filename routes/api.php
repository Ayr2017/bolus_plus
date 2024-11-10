<?php

use App\Http\Controllers\Api\V1\AnimalsController;
use App\Http\Controllers\Api\V1\SanctumController;
use App\Http\Controllers\Api\V1\UsersController;
use App\Http\Requests\Sanctum\CreateTokenRequest;
use App\Services\Sanctum\SanctumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::post('/sanctum/token', [SanctumController::class, 'createToken']);

Route::prefix('v1')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::apiResource('animals', AnimalsController::class);

        Route::get('users/get-current-user', [UsersController::class, 'getCurrentUser']);
        Route::apiResource('users', UsersController::class);
    });

