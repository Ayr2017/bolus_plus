<?php

use App\Http\Controllers\Admin\AnimalsController;
use App\Http\Controllers\Admin\EmployeesController as AdminEmployeesController;
use App\Http\Controllers\BreedsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\Admin\OrganisationsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('animals', AnimalsController::class);
    Route::resource('employees', AdminEmployeesController::class);
    Route::resource('organisations', OrganisationsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('permissions', PermissionsController::class);
});

Route::resource('employees', EmployeesController::class);
Route::resource('breeds', BreedsController::class);

