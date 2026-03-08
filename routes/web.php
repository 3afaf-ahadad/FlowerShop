<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

// Page d'accueil (Boutique)
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Routes dyal l-Panier (Cart)
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// Route Checkout (bach ma-ibqash error)
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');