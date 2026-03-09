@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fefaf9] py-20">
    <div class="max-w-6xl mx-auto px-6">
        
        <a href="{{ route('home') }}" class="inline-flex items-center text-[10px] uppercase tracking-widest text-gray-400 hover:text-pink-400 transition mb-12">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Retour à la boutique
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            
            <div class="relative group rounded-[4rem] overflow-hidden shadow-2xl shadow-pink-100/50 bg-white">
                <img src="{{ asset('storage/' . $fleur->image) }}" 
                     class="w-full h-[600px] object-cover transition duration-700 group-hover:scale-105" 
                     alt="{{ $fleur->nom }}"
                     onerror="this.src='https://via.placeholder.com/600x800?text=Fleur+Atelier'">
            </div>

            <div class="space-y-8">
                <div>
                    <span class="text-pink-300 text-[10px] uppercase tracking-[0.6em] font-semibold mb-4 block">Édition Limitée</span>
                    <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl md:text-6xl italic text-gray-800 leading-tight">
                        {{ $fleur->nom }}
                    </h1>
                </div>

                <div class="h-[1px] w-20 bg-pink-100"></div>

                <p class="text-gray-500 font-serif italic text-lg leading-relaxed max-w-lg">
                    {{ $fleur->description }}
                </p>

                <div class="flex items-baseline space-x-4">
                    <span class="font-serif text-5xl text-gray-800 font-light">{{ $fleur->prix }} DH</span>
                    <span class="text-pink-300 text-[11px] uppercase tracking-widest font-bold">TVA incluse</span>
                </div>

                <div class="py-6 border-y border-pink-50 flex items-center justify-between">
                    <span class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Disponibilité :</span>
                    <span class="bg-green-50 text-green-500 px-4 py-1 rounded-full text-[10px] uppercase font-bold tracking-widest">
                        En Stock ({{ $fleur->stock }})
                    </span>
                </div>

                <form action="{{ route('cart.add', $fleur->id) }}" method="POST" class="pt-4">
                    @csrf
                    <button type="submit" class="w-full md:w-auto bg-gray-900 text-white px-16 py-6 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] hover:bg-pink-500 transition-all duration-500 shadow-xl hover:-translate-y-1">
                        Ajouter au Panier 🌸
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection