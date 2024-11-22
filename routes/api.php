<?php

use App\Http\Controllers\Api\V1\AnimalGroupsController;
use App\Http\Controllers\Api\V1\AnimalsController;
use App\Http\Controllers\Api\V1\BreedsController;
use App\Http\Controllers\Api\V1\RestrictionReasonsController;
use App\Http\Controllers\Api\V1\RestrictionsController;
use App\Http\Controllers\Api\V1\SanctumController;
use App\Http\Controllers\Api\V1\SemenPortionsController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::post('/sanctum/token', [SanctumController::class, 'createToken']);
Route::prefix('v1')
    ->middleware(['auth:sanctum', 'locale'])
    ->group(function () {
        Route::apiResource('animals', AnimalsController::class);
        Route::apiResource('animal-groups', AnimalGroupsController::class);
        Route::apiResource('breeds', BreedsController::class);
        Route::apiResource('restrictions', RestrictionsController::class);
        Route::apiResource('restriction-reasons', RestrictionReasonsController::class);
        Route::apiResource('semen-portions', SemenPortionsController::class);
        Route::get('users/get-current-user', [UsersController::class, 'getCurrentUser']);
        Route::apiResource('users', UsersController::class);
    });

Route::prefix('v1')
    ->middleware(['api'])
    ->group(function () {
        Route::post('/auth', [SanctumController::class,'auth'])->name('auth');
    });


