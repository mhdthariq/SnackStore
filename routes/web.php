<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
// Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rute dengan middleware 'auth'
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Produk
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::post('/cart/add/{product}', [PesanController::class, 'add'])->middleware('auth')->name('cekout.add');
    Route::get('/cart', [PesanController::class, 'cart'])->middleware('auth')->name('cart.index');
    Route::get('/checkout', [PesanController::class, 'checkout'])->name('checkout');
    Route::get('/checkout', [PesanController::class, 'index'])->name('checkout.index');
    Route::put('/cart/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{item}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/checkout/complete', [PesanController::class, 'completeCheckout'])->name('complete.checkout');
    Route::get('/order/{id}/status', [PesanController::class, 'status'])->name('order.status');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/order/history', [OrderController::class, 'index'])->name('order.history');
});

// Rute Otentikasi
require __DIR__.'/auth.php';