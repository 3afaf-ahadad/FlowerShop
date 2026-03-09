<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| 🌸 Public Routes
|--------------------------------------------------------------------------
*/
// Had l-route hya l-accueil (home)
Route::get('/', [ProductController::class, 'index'])->name('home');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// 
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// 
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');


// Route bach n-choufou detail dyal kol fleur
Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


/*
|--------------------------------------------------------------------------
| 🛒 Cart Routes (Panier)
|--------------------------------------------------------------------------
*/
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
//confirmation
Route::get('/confirmation', function(){

$reference = session('order_reference');
$cart = session('order_cart');
$total = session('order_total');

return view('confirmation', compact('reference','cart','total'));

})->name('confirmation');
