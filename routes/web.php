<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

//formulaire
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// info apres clique  sur un bouton
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
