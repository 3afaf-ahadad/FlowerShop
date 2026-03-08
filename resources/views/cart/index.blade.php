@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 max-w-5xl">
        <h1 class="text-3xl font-serif mb-10 text-center uppercase tracking-widest text-gray-800">Mon Panier 🛒</h1>

        @if(session('cart') && count(session('cart')) > 0)
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex-grow space-y-4">
                    @foreach(session('cart') as $id => $details)
                        <div class="bg-white p-4 md:p-6 rounded-[2rem] shadow-sm flex items-center gap-4 border border-gray-100 transition-all hover:shadow-md">
                            <img src="{{ asset('storage/' . $details['image']) }}" 
                                 class="w-20 h-20 object-cover rounded-2xl" 
                                 onerror="this.src='https://placehold.co/200x200?text=Fleur+🌸'">
                            
                            <div class="flex-grow">
                                <h3 class="font-bold text-gray-800 text-sm">{{ $details['name'] }}</h3>
                                <p class="text-pink-500 font-serif italic text-sm">{{ number_format($details['price'], 2) }} DH</p>
                            </div>

                            <div class="flex items-center bg-gray-50 rounded-full px-2 py-1 border border-gray-100">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-pink-500 transition font-bold">-</button>
                                </form>

                                <span class="px-3 font-bold text-gray-800 text-sm">{{ $details['quantity'] }}</span>

                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-pink-500 transition font-bold">+</button>
                                </form>
                            </div>

                            <div class="text-right min-w-[80px]">
                                <span class="font-bold text-gray-900">{{ number_format($details['price'] * $details['quantity'], 2) }} DH</span>
                            </div>

                            <form action="{{ route('cart.remove') }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="text-gray-300 hover:text-red-400 transition">🗑️</button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="w-full lg:w-80">
                    <div class="bg-gray-900 text-white p-8 rounded-[2.5rem] shadow-xl sticky top-6">
                        <p class="text-[10px] uppercase tracking-widest opacity-60 mb-2">Total de la commande</p>
                        <h2 class="text-4xl font-serif mb-8 border-b border-white/10 pb-6">
                            @php $total = 0 @endphp
                            @foreach(session('cart') as $details) 
                                @php $total += $details['price'] * $details['quantity'] @endphp 
                            @endforeach
                            {{ number_format($total, 2) }} <span class="text-xs">DH</span>
                        </h2>
                        <button class="w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl font-bold text-xs uppercase tracking-widest transition-all shadow-lg active:scale-95">
                            Commander ✨
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-[3rem] shadow-sm border border-gray-100">
                <p class="text-gray-400 font-serif italic text-xl mb-6">Votre panier est vide... 🥀</p>
                <a href="{{ url('/') }}" class="inline-block bg-gray-900 text-white px-8 py-3 rounded-full text-xs uppercase tracking-widest font-bold hover:bg-pink-500 transition">
                    Retour à la boutique
                </a>
            </div>
        @endif
    </div>
</div>
@endsection