<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;

// ------------------ Admin Routes ------------------
Route::prefix('admin')->group(function () {
    // Login & Logout
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected admin routes
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('users', [AdminController::class, 'users'])->name('admin.users.index');

        // Admin Product CRUD
        Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::post('products/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::post('products/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });
});

// ------------------ User Dashboard ------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('home');
    })->name('dashboard');
});

// ------------------ Public Pages ------------------
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/about', 'about')->name('about');

// Public Product Pages
Route::get('/rings', [ProductController::class, 'rings'])->name('products.rings');
Route::get('/pendants', [ProductController::class, 'pendants'])->name('products.pendants');
Route::get('/earrings', [ProductController::class, 'earrings'])->name('products.earrings');
Route::get('/bracelets', [ProductController::class, 'bracelets'])->name('products.bracelets');

// Optional: add to cart
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

