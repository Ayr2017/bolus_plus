<?php

use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\OrganisationsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('employees', EmployeesController::class);
    Route::resource('organisations', OrganisationsController::class);
    Route::resource('users', UsersController::class);
});
