@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-5xl">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Mon Panier <span class="text-pink-500">🌸</span></h1>
        <a href="{{ url('/') }}" class="text-pink-500 hover:text-gray-900 font-semibold transition">← Continuer mes achats</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('cart') && count(session('cart')) > 0)
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-pink-50 text-pink-700 uppercase text-xs tracking-widest">
                    <tr>
                        <th class="p-6">Produit</th>
                        <th class="p-6 text-center">Prix</th>
                        <th class="p-6 text-center">Quantité</th>
                        <th class="p-6 text-right">Sous-total</th>
                        <th class="p-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php $totalGeneral = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                        @php 
                            $subtotal = $details['price'] * $details['quantity'];
                            $totalGeneral += $subtotal;
                        @endphp
                        <tr class="hover:bg-pink-50/30 transition-colors">
                            <td class="p-6 flex items-center gap-4">
                                <div class="w-24 h-24 flex-shrink-0">
                                    {{-- Hada houwa l-path l-shih m3a storage --}}
                                    <img src="{{ asset('storage/products/' . $details['image']) }}" 
     class="w-full h-full object-cover rounded-2xl shadow-md border-2 border-white"
     onerror="this.src='https://placehold.co/200x200?text=Path+Error+🌸'">
                                </div>
                                <span class="font-bold text-gray-800 text-lg">{{ $details['name'] }}</span>
                            </td>
                            <td class="p-6 text-center text-gray-600 font-medium">{{ number_format($details['price'], 2) }} DH</td>
                            <td class="p-6 text-center">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 border-2 border-pink-100 rounded-xl p-2 text-center focus:border-pink-400 outline-none">
                                    <button type="submit" class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                                    </button>
                                </form>
                            </td>
                            <td class="p-6 text-right font-black text-pink-600 text-xl">{{ number_format($subtotal, 2) }} DH</td>
                            <td class="p-6 text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-gray-300 hover:text-red-500 transition-transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex flex-col items-end">
            <div class="bg-gray-900 text-white p-8 rounded-3xl shadow-xl w-full md:w-96 text-right">
                <p class="text-gray-400 uppercase text-xs mb-2">Total à payer</p>
                <h2 class="text-5xl font-black mb-6">{{ number_format($totalGeneral, 2) }} <span class="text-pink-500 text-2xl">DH</span></h2>
                <a href="{{ route('checkout') }}" class="block text-center bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl font-bold text-lg transition shadow-lg">Passer à la caisse ✨</a>
            </div>
        </div>
    @else
        <div class="text-center py-32 bg-white rounded-3xl border-2 border-dashed border-gray-100 shadow-sm">
            <p class="text-gray-400 text-xl italic mb-8">Oups! Votre panier est vide... 🥀</p>
            <a href="{{ url('/') }}" class="bg-gray-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-pink-500 transition shadow-xl inline-block">Voir nos fleurs 🌸</a>
        </div>
    @endif
</div>
@endsection