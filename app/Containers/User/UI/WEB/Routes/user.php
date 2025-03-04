<?php

use Illuminate\Support\Facades\Route;
use App\Containers\User\UI\WEB\Controllers\UserController;

Route::middleware(['auth', 'role:root,admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
});
