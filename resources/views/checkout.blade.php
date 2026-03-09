@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fefaf9] py-12 flex items-center justify-center">

<div class="w-full max-w-5xl bg-white p-10 rounded-[3rem] shadow-xl border border-pink-50">

<div class="text-center mb-10">
<h1 class="text-4xl italic text-gray-800 mb-3">Finaliser la commande</h1>
<p class="text-pink-300 text-xs uppercase tracking-[0.3em]">L'Atelier des Fleurs</p>
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