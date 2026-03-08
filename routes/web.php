<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/', [ProductController::class, 'index']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Route bach t-zidi produit (khass tkoun POST)
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Route bach t-7iyedi produit (khass tkoun DELETE)
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Route bach mat-tla3ch error d checkout
Route::get('/checkout', function() { return "Page de paiement"; })->name('checkout');

Route::view('/merci','merci')->name('merci');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

