<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SanctionController;

Route::get('/', fn() => view('landing-page'));

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::resource('sanctions', SanctionController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);