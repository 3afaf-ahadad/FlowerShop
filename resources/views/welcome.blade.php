@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fefaf9] py-12">

    <div class="max-w-6xl mx-auto px-6">



        <div class="relative w-full h-[600px] mb-24 overflow-hidden rounded-[4rem] shadow-2xl shadow-pink-100/50">
    <img src="" 
         class="absolute inset-0 w-full h-full object-cover grayscale-[0.1] hover:grayscale-0 transition duration-1000"
         alt="Bouquet Signature">
    
    <div class="absolute inset-0 bg-gradient-to-r from-white/80 via-white/40 to-transparent flex items-center">
        <div class="max-w-2xl ml-16 md:ml-24 px-6">
            <span class="text-pink-300 text-[10px] uppercase tracking-[0.6em] font-semibold mb-4 block">Collection Printemps 2026</span>
            
            <h1 style="font-family: 'Playfair Display', serif;" class="text-6xl md:text-7xl italic text-gray-800 leading-tight mb-6">
                L'élégance à <br>chaque pétale
            </h1>
            
            <p class="text-gray-500 font-serif italic text-lg mb-10 max-w-md leading-relaxed">
                Découvrez nos compositions artisanales conçues pour transformer vos moments en souvenirs inoubliables.
            </p>
            
            <div class="flex space-x-6">
                <a href="#produits" class="bg-gray-900 text-white px-10 py-5 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] hover:bg-pink-500 transition-all duration-500 shadow-xl hover:-translate-y-1">
                    Explorer la Boutique
                </a>
                <div class="flex items-center space-x-3">
                    <span class="h-[1px] w-8 bg-pink-200"></span>
                    <span class="text-[9px] text-pink-300 uppercase tracking-widest font-bold">Artisan Fleuriste</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="produits"></div>



        
        <div class="text-center mb-16">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">Nos Magnifiques Bouquets</h1>
            <div class="flex justify-center items-center space-x-2">
                <span class="h-[1px] w-8 bg-pink-100"></span>
                <span class="text-pink-300 text-[10px] uppercase tracking-[0.4em] font-semibold">L'Atelier des Fleurs</span>
                <span class="h-[1px] w-8 bg-pink-100"></span>
            </div>
        </div>


<div class="max-w-4xl mx-auto px-6">

<div class="text-center mb-16">
<h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">
Finaliser votre commande
</h1>

<div class="flex justify-center items-center space-x-2">
<span class="h-[1px] w-8 bg-pink-100"></span>
<span class="text-pink-300 text-[10px] uppercase tracking-[0.4em] font-semibold">
L'Atelier des Fleurs
</span>
<span class="h-[1px] w-8 bg-pink-100"></span>
</div>
</div>

<div class="bg-white/70 backdrop-blur-md p-10 rounded-[3rem] border border-pink-50 shadow-xl">

<form action="{{ route('order.store') }}" method="POST">
@csrf

<div class="space-y-6">

<div>
<label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Nom</label>
<input type="text" name="nom"
class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
</div>

<div>
<label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Prénom</label>
<input type="text" name="prenom"
class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
</div>

<div>
<label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Adresse</label>
<input type="text" name="adresse"
class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
</div>

<div>
<label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Téléphone</label>
<input type="text" name="telephone"
class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
</div>

</div>

<div class="mt-12 text-center">

<button type="submit"
class="bg-pink-500 hover:bg-gray-900 text-white px-12 py-5 rounded-full font-bold text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all duration-500 transform hover:-translate-y-1">

Valider la commande

</button>

</div>

</form>

</div>

</div>

</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&display=swap');
</style>

@endsection