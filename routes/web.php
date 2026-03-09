<?php

use Illuminate\Support\Facades\Route;
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