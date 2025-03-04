<?php

use Illuminate\Support\Facades\Route;
use App\Containers\Auth\UI\WEB\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
