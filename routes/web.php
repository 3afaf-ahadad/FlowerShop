<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

<<<<<<< HEAD
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
=======
//  Farah's : The Product Catalog
Route::get('/', [ProductController::class, 'index'])->name('products.index');

//  Nouhaila's : The Shopping Cart
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update'); 
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

//  Ghita's : Checkout & Orders
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

//  Soukaina's : Admin CRUD
Route::prefix('admin')->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
});
>>>>>>> ba55e6b0e114e133aa6c05b802a7364a0eb6a4c2
