<?php
use Illuminate\Support\Facades\Route;
use App\Containers\User\UI\WEB\Controllers\RoleController;

/*
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])
        ->middleware(['permission:create-roles'])
        ->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
});
*/
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('roles', RoleController::class);
});

