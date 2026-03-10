<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

// ================= Public Routes =================
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// ================= Cart Routes =================
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// ================= Confirmation =================
Route::get('/confirmation', function(){
    $reference = session('order_reference');
    $cart = session('order_cart');
    $total = session('order_total');

    return view('confirmation', compact('reference','cart','total'));
})->name('confirmation');

// ================= Admin Routes (Protected) =================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // 1️⃣ Dashboard Overview – Member 4
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    // ✅ Comment: Route for dashboard, fetch totals & low stock

    // 2️⃣ Admin Order List – Member 1
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'adminIndex'])->name('orders.index');
    // ✅ Comment: adminIndex() fetch all orders

    // 3️⃣ Order Status Update – Member 1
    Route::post('/orders/{id}/ship', [App\Http\Controllers\OrderController::class, 'ship'])->name('orders.ship');
    // ✅ Comment: ship() method update status Pending → Shipped

    // 4️⃣ Gestion des Produits – Member 2
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

    // 5️⃣ Gestion des Catégories – Member 2
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
});








/*use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController; */

/*
|--------------------------------------------------------------------------
| 🌸 Public Routes
|--------------------------------------------------------------------------
*/
// Had l-route hya l-accueil (home)
/*Route::get('/', [ProductController::class, 'index'])->name('home');


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
/*Route::prefix('cart')->group(function () {
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
/*
|--------------------------------------------------------------------------
| 🔐 Admin Routes (Espace Privé)
|--------------------------------------------------------------------------
*/

/*Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // 1. Dashboard Principal (Vue d'ensemble)
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // 2. Gestion des Commandes (Member 3)
    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{id}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    // 3. Gestion des Produits (Member 2)
    // Had 'resource' kat-qad lik (Index, Create, Store, Edit, Update, Delete) f ster wahed
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

    // 4. Gestion des Catégories (Member 2)
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
}); */