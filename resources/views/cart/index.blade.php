@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fefaf9] py-12">
    <div class="max-w-5xl mx-auto px-6">
        
        <div class="text-center mb-16">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">Mon Petit Panier</h1>
            <div class="flex justify-center items-center space-x-2">
                <span class="h-[1px] w-8 bg-pink-100"></span>
                <span class="text-pink-300 text-[10px] uppercase tracking-[0.4em] font-semibold">L'Atelier des Fleurs</span>
                <span class="h-[1px] w-8 bg-pink-100"></span>
            </div>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
            @php $total = 0; @endphp

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8 space-y-6">
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        
                        <div class="group bg-white/70 backdrop-blur-md p-6 rounded-[2.5rem] border border-pink-50 flex items-center shadow-sm hover:shadow-xl transition-all duration-700">
                            <div class="w-28 h-28 rounded-3xl overflow-hidden shadow-inner flex-shrink-0 bg-pink-50">
                                <img src="{{ asset('storage/' . $details['image']) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-1000 grayscale-[0.2] group-hover:grayscale-0">
                            </div>
                            
                            <div class="ml-8 flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-serif text-2xl text-gray-800 italic">{{ $details['name'] }}</h3>
                                        <p class="text-[10px] text-pink-300 uppercase tracking-widest mt-1">Édition Limitée</p>
                                    </div>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="text-gray-200 hover:text-pink-400 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="mt-6 flex justify-between items-center">
                                    <div class="flex items-center bg-[#fdf2f5] rounded-full px-4 py-2 border border-pink-50">
                                        <span class="text-[9px] text-pink-400 uppercase font-bold mr-3 tracking-tighter">Quantité</span>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" onchange="this.form.submit()" class="bg-transparent w-8 text-center text-xs font-black text-pink-600 focus:outline-none">
                                        </form>
                                    </div>
                                    <span class="font-serif text-xl text-gray-700 font-light">{{ $details['price'] * $details['quantity'] }} DH</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="lg:col-span-4">
                    <div class="bg-gray-900 p-10 rounded-[3rem] text-white sticky top-32 shadow-2xl relative">
                        <h2 class="font-serif text-3xl italic mb-10 border-b border-gray-800 pb-6">Sommaire</h2>
                        <div class="space-y-5 mb-12">
                            <div class="flex justify-between text-sm text-gray-400 italic">
                                <span>Sous-total</span>
                                <span>{{ number_format($total, 2) }} DH</span>
                            </div>
                            <div class="pt-8 border-t border-gray-800 flex justify-between items-end">
                                <span class="font-serif text-lg italic text-gray-300">Total TTC</span>
                                <span class="text-4xl font-light text-pink-400">{{ number_format($total, 2) }} DH</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout') }}" class="block w-full text-center bg-pink-500 text-white py-5 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] hover:bg-white hover:text-pink-500 transition-all duration-500">
                            Valider la commande
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-40">
                <p class="font-serif text-3xl italic text-gray-400 mb-8">Votre panier est vide.</p>
                <a href="{{ url('/') }}" class="bg-pink-400 text-white px-8 py-3 rounded-full uppercase text-[10px] font-bold tracking-widest">Retour Boutique</a>
            </div>
        @endif
    </div>
</div>
@endsection