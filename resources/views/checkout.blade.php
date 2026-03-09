<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// 1. Boutique
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// 2. Le Panier (Cart) - Modifié pour supporter Update & Remove
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add'); // Rej3naha GET bach t-koun sahla
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

// 3. Checkout
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// 4. Store Order
Route::post('/order', function () {
    return "Commande Validée !";
})->name('order.store');