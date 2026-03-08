@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800">Mon Panier <span class="text-pink-500">🌸</span></h1>
        @if(count($cart) > 0)
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-red-400 hover:text-red-600 underline transition">Vider le panier</button>
            </form>
        @endif
    </div>

    @if(count($cart) > 0)
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-6">Produit</th>
                        <th class="p-6 text-center">Prix</th>
                        <th class="p-6 text-center">Quantité</th>
                        <th class="p-6 text-right">Total</th>
                        <th class="p-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php $totalGeneral = 0 @endphp
                    @foreach($cart as $id => $details)
                        @php 
                            $price = $details['price'] ?? 0;
                            $subtotal = $price * $details['quantity'];
                            $totalGeneral += $subtotal;
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="p-6 flex items-center gap-4">
                                <img src="{{ asset('storage/' . $details['image']) }}" class="w-16 h-16 object-cover rounded-2xl shadow-sm">
                                <span class="font-semibold text-gray-800">{{ $details['name'] }}</span>
                            </td>
                            <td class="p-6 text-center text-gray-600">{{ $price }} DH</td>
                            <td class="p-6">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-14 border-gray-200 rounded-lg p-1 text-center focus:ring-pink-500 focus:border-pink-500">
                                    <button type="submit" class="text-blue-500 hover:bg-blue-50 p-1 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="p-6 text-right font-bold text-gray-900">{{ $subtotal }} DH</td>
                            <td class="p-6 text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-gray-300 hover:text-red-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-10 p-8 bg-gray-900 rounded-3xl text-white flex justify-between items-center shadow-2xl">
            <div>
                <p class="text-gray-400 text-sm uppercase tracking-widest mb-1">Total à régler</p>
                <h2 class="text-4xl font-bold">{{ $totalGeneral }} <span class="text-pink-400 text-2xl">DH</span></h2>
            </div>
            <a href="{{ route('checkout') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-10 py-4 rounded-2xl font-bold shadow-lg shadow-pink-500/30 transition transform hover:-translate-y-1">
                Commander Maintenant ✨
            </a>
        </div>
    @else
        <div class="text-center py-24 bg-white rounded-3xl border border-dashed border-gray-200">
            <p class="text-gray-400 text-lg mb-6 italic">"Votre panier attend ses premières fleurs..." 🥀</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-gray-900 text-white px-8 py-3 rounded-xl font-medium hover:bg-pink-500 transition">
                Explorer la Boutique
            </a>
        </div>
    @endif
</div>
@endsection