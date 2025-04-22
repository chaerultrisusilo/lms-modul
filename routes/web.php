<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('login');
});
Route::get('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('action-login', [AuthController::class, 'actionLogin']);

route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UsersController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('instructors', InstructorsController::class);
});
