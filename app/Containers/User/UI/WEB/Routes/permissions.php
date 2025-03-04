<?php
use Illuminate\Support\Facades\Route;
use App\Containers\User\UI\WEB\Controllers\Admin\PermissionController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('permissions', PermissionController::class);
});
