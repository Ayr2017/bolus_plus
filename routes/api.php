<?php

use App\Http\Controllers\Api\V1\AnimalsController;
use App\Http\Controllers\Api\V1\BreedsController;
use App\Http\Controllers\Api\V1\SanctumController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Support\Facades\Route;

Route::post('/sanctum/token', [SanctumController::class, 'createToken']);

Route::prefix('v1')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::apiResource('animals', AnimalsController::class);
        Route::apiResource('breeds', BreedsController::class);

        Route::get('users/get-current-user', [UsersController::class, 'getCurrentUser']);
        Route::apiResource('users', UsersController::class);
    });

Route::prefix('v1')
    ->middleware(['api'])
    ->group(function () {
        Route::post('/auth', [SanctumController::class,'auth'])->name('auth');
    });

