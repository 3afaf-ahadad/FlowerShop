<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| 🌸 Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| 🛒 Cart Routes
|--------------------------------------------------------------------------
*/
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

/*
|--------------------------------------------------------------------------
| 🔐 Authenticated Routes (Middleware Group)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Logic dyal redirect mlli kiy-dir user login
    Route::middleware(['auth'])->group(function () {
    // Had l-route hya li khassa t-khdem mlli kadi-ri login
    Route::get('/dashboard', function () {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    })->name('dashboard'); 
});
    // Checkout o Orders
    Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    
    Route::get('/merci', function () {
        return view('merci');
    })->name('order.success');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| 👑 Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('admin.dashboard');
});

// Auth (Login, Register, etc.)
require __DIR__.'/auth.php';
=======
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

// 1. Boutique
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// 2. Panier (Standardized Routes)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add'); // POST hna!
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// 3. Checkout
Route::get('/checkout', fn() => view('checkout'))->name('checkout');
>>>>>>> nouhaila
