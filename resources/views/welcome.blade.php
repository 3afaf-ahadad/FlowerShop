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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($fleurs as $fleur)
            <div class="group bg-white/70 backdrop-blur-md rounded-[3rem] border border-pink-50 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-700 flex flex-col">
                
                <div class="relative h-72 overflow-hidden bg-pink-50">
                    <img src="{{ asset('storage/products/' . $fleur->image) }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-1000 grayscale-[0.1] group-hover:grayscale-0"
                         alt="{{ $fleur->nom }}">
                    
                    <div class="absolute top-6 right-6">
                        <span class="bg-white/90 backdrop-blur-sm text-[9px] text-pink-400 px-3 py-1 rounded-full uppercase tracking-widest font-bold shadow-sm">
                            Stock: {{ $fleur->stock }}
                        </span>
                    </div>
                </div>

                <div class="p-8 flex-1 flex flex-col justify-between text-center">
                    <div>
                        <h3 class="font-serif text-2xl text-gray-800 italic mb-2">{{ $fleur->nom }}</h3>
                        <p class="text-[10px] text-pink-300 uppercase tracking-widest mb-4">Édition Artisanale</p>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 italic">
                            {{ Str::limit($fleur->description, 80) }}
                        </p>
                    </div>

                    <div class="space-y-6">
                        <span class="block font-serif text-2xl text-gray-700 font-light">{{ $fleur->prix }} DH</span>
                        
                        <form action="{{ route('cart.add', $fleur->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-gray-900 hover:bg-pink-500 text-white py-4 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] shadow-lg transition-all duration-500 transform hover:-translate-y-1">
                                Ajouter au Panier 🌸
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap');
</style>
@endsection