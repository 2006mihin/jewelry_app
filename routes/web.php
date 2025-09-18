<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;


// ------------------ Admin Routes ------------------
Route::prefix('admin')->group(function () {
    // Admin login
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected admin routes
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('users', [AdminController::class, 'users'])->name('admin.users.index');
    });
});

// ------------------ Customer / Normal User Routes ------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        
        return view('home');
    })->name('dashboard');
});

// ------------------ Public Routes ------------------

Route::get('/', function () {
    return view('home');
})->name('home');


Route::view('/about', 'about')->name('about');
