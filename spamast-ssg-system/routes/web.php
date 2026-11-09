<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SanctionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('landing-page'));

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::resource('sanctions', SanctionController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);

Route::resource('attendance', AttendanceController::class)->except(['show']);