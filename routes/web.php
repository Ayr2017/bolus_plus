<?php

use App\Http\Controllers\Admin\EmployeesController as AdminEmployeesController;
use App\Http\Controllers\Admin\OrganisationsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\BreedsController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('employees', AdminEmployeesController::class);
    Route::resource('organisations', OrganisationsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);

    Route::patch('employees/{employee}/permissions', [EmployeesController::class, 'updatePermissions'])->name('employees.permissions.update');
});

Route::resource('animals', AnimalsController::class);
Route::resource('employees', EmployeesController::class);
Route::resource('breeds', BreedsController::class);

