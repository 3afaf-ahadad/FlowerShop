<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\CheckoutController;

//formulaire
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// info apres clique  sur un bouton
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
=======
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
>>>>>>> 93c8f016aa5419dca8ca66fde285066c99dd15a3
