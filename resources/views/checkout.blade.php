@extends('layouts.app')

@section('content')

<div class="container mx-auto py-12 max-w-4xl">

<h1 class="text-3xl text-center mb-10 font-serif">Finaliser la commande</h1>

<div class="grid md:grid-cols-2 gap-10">

<div>

<form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
@csrf

<input type="text" name="nom" placeholder="Nom" required class="w-full border p-3 rounded">

<input type="email" name="email" placeholder="Email" required class="w-full border p-3 rounded">

<input type="text" name="adresse" placeholder="Adresse" required class="w-full border p-3 rounded">

<button type="submit" class="bg-pink-500 text-white px-6 py-3 rounded w-full">
Valider la commande
</button>

</form>

</div>


<div class="bg-gray-100 p-6 rounded">

<h2 class="font-bold mb-4">Résumé de la commande</h2>

@php $total = 0 @endphp

@foreach($cart as $item)

<p class="flex justify-between">
<span>{{ $item['name'] }}</span>
<span>{{ $item['price'] * $item['quantity'] }} DH</span>
</p>

@php $total += $item['price'] * $item['quantity'] @endphp

@endforeach

<hr class="my-4">

<p class="flex justify-between font-bold">
<span>Total</span>
<span>{{ $total }} DH</span>
</p>

</div>

</div>

</div>

@endsection