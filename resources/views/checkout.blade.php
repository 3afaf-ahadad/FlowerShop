<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
=======
@section('content')

<<<<<<< HEAD
<div class="min-h-screen bg-[#fefaf9] py-12 flex items-center justify-center">

<div class="w-full max-w-5xl bg-white p-10 rounded-[3rem] shadow-xl border border-pink-50">

<div class="text-center mb-10">
<h1 class="text-4xl italic text-gray-800 mb-3">Finaliser la commande</h1>
<p class="text-pink-300 text-xs uppercase tracking-[0.3em]">L'Atelier des Fleurs</p>
=======
        <div class="text-center mb-16">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">
                Finaliser la Commande
            </h1>
>>>>>>> 436bc6ae158341906975e47ca401e52e9e2562eb

// 1. Boutique
Route::get('/', [ProductController::class, 'index'])->name('products.index');

<<<<<<< HEAD
// 2. Le Panier (Cart) - Modifié pour supporter Update & Remove
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add'); // Rej3naha GET bach t-koun sahla
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

// 3. Checkout
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// 4. Store Order
Route::post('/order', function () {
    return "Commande Validée !";
})->name('order.store');
=======
        <div class="bg-white/70 backdrop-blur-md p-12 rounded-[3rem] border border-pink-50 shadow-xl">

            <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                @csrf

                <input type="text" name="nom" placeholder="Nom" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="prenom" placeholder="Prenom" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="email" name="email" placeholder="Email" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="telephone" placeholder="Telephone" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="adresse" placeholder="Adresse" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="ville" placeholder="Ville" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <button type="submit"
                class="w-full bg-pink-500 hover:bg-white hover:text-pink-500 text-white py-5 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                    Commander
                </button>

            </form>

        </div>

    </div>
>>>>>>> 430b2006d96f28ada93195531ac617eb2b7f8a4a
</div>

<div class="grid md:grid-cols-2 gap-10">

<!-- FORM -->

<form action="{{ route('checkout.store') }}" method="POST" class="space-y-5">

@csrf

<input type="text" name="nom" placeholder="Nom" required
class="w-full border border-pink-200 rounded-full px-6 py-3 focus:ring-2 focus:ring-pink-300">

<input type="email" name="email" placeholder="Email" required
class="w-full border border-pink-200 rounded-full px-6 py-3 focus:ring-2 focus:ring-pink-300">

<input type="text" name="telephone" placeholder="Téléphone" required
class="w-full border border-pink-200 rounded-full px-6 py-3 focus:ring-2 focus:ring-pink-300">

<input type="text" name="adresse" placeholder="Adresse" required
class="w-full border border-pink-200 rounded-full px-6 py-3 focus:ring-2 focus:ring-pink-300">

<button type="submit"
class="w-full bg-pink-500 text-white py-4 rounded-2xl font-bold uppercase text-xs tracking-widest hover:bg-pink-600 transition">
Valider la commande
</button>

</form>


<!-- RESUME -->

<div class="bg-gray-50 p-6 rounded-2xl">

<h2 class="font-bold mb-6 text-gray-700">Résumé de la commande</h2>

@php $total = 0; @endphp

@if(session('cart'))

@foreach(session('cart') as $item)

<div class="flex justify-between mb-3">

<span class="text-gray-600">
{{ $item['name'] }} x {{ $item['quantity'] }}
</span>

<span class="font-bold text-gray-800">
{{ $item['price'] * $item['quantity'] }} DH
</span>

</div>

@php $total += $item['price'] * $item['quantity']; @endphp

@endforeach

@endif

<hr class="my-4">

<div class="flex justify-between font-bold text-lg">

<span>Total</span>
<span>{{ $total }} DH</span>

</div>

</div>

</div>

</div>

</div>

@endsection
>>>>>>> 436bc6ae158341906975e47ca401e52e9e2562eb
