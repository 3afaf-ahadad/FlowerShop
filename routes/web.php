<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


Route::get('/', [ProductController::class, 'index']);


<<<<<<< HEAD
// panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
// checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// order
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
=======
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');


Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
>>>>>>> 644493b1e3d11ca087a74f7800e1ac350a85c3fa
