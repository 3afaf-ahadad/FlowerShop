@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fefaf9] flex items-center justify-center py-20">

<div class="max-w-2xl mx-auto text-center bg-white/70 backdrop-blur-md p-16 rounded-[3rem] border border-pink-50 shadow-xl">

<div class="text-6xl mb-6">🌸</div>

<h1 style="font-family: 'Playfair Display', serif;" class="text-4xl italic text-gray-800 mb-4">
Merci pour votre commande
</h1>

<p class="text-gray-500 mb-10">
Votre commande a été enregistrée avec succès.
</p>

<a href="/"
class="inline-block bg-pink-500 hover:bg-white hover:text-pink-500 text-white px-10 py-4 rounded-full font-bold text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all duration-500 transform hover:-translate-y-1">

Retour à la boutique

</a>

</div>

</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&display=swap');
</style>

@endsection