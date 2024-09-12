<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\BreedsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeesController as AdminEmployeesController;
use App\Http\Controllers\OrganisationsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('users', UsersController::class);
    Route::resource('animals', AnimalsController::class);
    Route::resource('employees', EmployeesController::class);
    Route::resource('breeds', BreedsController::class);
    Route::resource('statuses', BreedsController::class);
    Route::resource('statuses', StatusesController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('employees', AdminEmployeesController::class);
    Route::resource('organisations', OrganisationsController::class);
    Route::resource('permissions', PermissionsController::class);

    Route::patch('employees/{employee}/permissions', [EmployeesController::class, 'updatePermissions'])->name('employees.permissions.update');
    Route::patch('users/{user}/roles', [UsersController::class, 'updateRoles'])->name('users.roles.update');
});




