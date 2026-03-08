<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// 🌸 Farah's : The Product Catalog
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// 🛒 Nouhaila's : The Shopping Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Kept this for quantity changes
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// 💳 Ghita's : Checkout & Orders
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');