@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fefaf9] py-20">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-24">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-6xl italic text-gray-800 mb-4">L'Éclat de Rose</h1>
            <div class="flex justify-center items-center space-x-3">
                <span class="h-[1px] w-10 bg-pink-100"></span>
                <span class="text-pink-300 text-[10px] uppercase tracking-[0.5em] font-bold">L'Excellence Florale</span>
                <span class="h-[1px] w-10 bg-pink-100"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24">
            @foreach($fleurs as $product)
            <div class="flex flex-col items-center group">
                
                <div class="relative w-full aspect-[4/5] rounded-[3.5rem] overflow-hidden bg-white border border-pink-50 shadow-sm hover:shadow-2xl transition-all duration-700">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 group-hover:scale-105 transition duration-1000">
                    
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="absolute inset-x-8 bottom-10 translate-y-24 group-hover:translate-y-0 transition-all duration-500">
                        @csrf
                        <button type="submit" class="w-full bg-gray-900/90 backdrop-blur-md text-white py-4 rounded-2xl font-bold text-[9px] uppercase tracking-widest hover:bg-pink-500 transition-colors">
                            Ajouter au Panier
                        </button>
                    </form>
                </div>

                <div class="mt-10 text-center w-full">
                    <p class="text-[9px] text-pink-300 uppercase tracking-[0.4em] font-bold mb-3 italic">Édition Limitée</p>
                    
                    {{-- Bdlna ->name b ->nom --}}
                    <h3 style="font-family: 'Playfair Display', serif;" class="text-3xl text-gray-800 italic mb-4">{{ $product->nom }}</h3>
                    
                    <div class="flex items-center justify-center space-x-4">
                        <span class="h-[1px] w-6 bg-pink-100"></span>
                        <span class="text-xl font-light text-gray-700 tracking-tighter">
                            {{-- Bdlna ->price b ->prix --}}
                            {{ number_format($product->prix, 2, '.', ' ') }} DH
                        </span>
                        <span class="h-[1px] w-6 bg-pink-100"></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection