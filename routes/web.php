<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// ------------------ Admin Routes ------------------
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});

// ------------------ Customer/User Routes ------------------
// These routes are usually provided by Jetstream automatically
// But make sure they are not inside any 'admin' prefix

// Example (if using Jetstream):
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome'); // or your custom customer homepage
});

// If you need custom login/register views for customer, you can add:
// Route::get('/login', [CustomerAuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [CustomerAuthController::class, 'login']);
// Route::get('/register', [CustomerAuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [CustomerAuthController::class, 'register']);
