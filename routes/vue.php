<?php

use App\Http\Controllers\Vue\BolusReadingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('bolus-readings', BolusReadingsController::class);
});
