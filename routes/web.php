<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Page d'accueil
Route::get('/', [ProductController::class, 'index']);

// Panier (Cart)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Checkout (La page dial Ghita)
// Tأkkdi bli Ghita dart view smiytu checkout.blade.php
Route::get('/checkout', function() {
    return view('checkout'); 
})->name('checkout');