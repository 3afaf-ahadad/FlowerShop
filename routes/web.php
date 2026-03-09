<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
Route::get('/', [ProductController::class, 'index']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// 
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// 
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');

// 
Route::get('/checkout', function() { return "Page de paiement"; })->name('checkout');
//

Route::get('/', [ProductController::class, 'index']);
Route::resource('admin/products', AdminProductController::class);