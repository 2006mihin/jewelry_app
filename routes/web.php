<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {
    // Guest routes
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

    // Protected admin routes
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        // More: product management, orders, shipments...
    });
});
