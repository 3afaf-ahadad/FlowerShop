<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'index']);

// Afficher le panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Action d'ajouter (POST)
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Action de supprimer (DELETE)
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');