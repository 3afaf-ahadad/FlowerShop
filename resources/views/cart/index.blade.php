@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <div class="flex items-center space-x-4 mb-10">
        <h2 class="text-4xl font-extrabold text-pink-600">Mon Panier</h2>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-2/3">
                <div class="bg-white rounded-2xl shadow-sm border border-pink-100 overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-pink-50 text-pink-700 uppercase text-xs font-bold">
                            <tr>
                                <th class="p-5">Produit</th>
                                <th class="p-5">Prix</th>
                                <th class="p-5 text-center">Quantité</th>
                                <th class="p-5">Sous-total</th>
                                <th class="p-5"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-pink-50">
                            @php $total = 0 @endphp
                            @foreach(session('cart') as $id => $details)
                                @php 
                                    $subtotal = $details['price'] * $details['quantity'];
                                    $total += $subtotal;
                                @endphp
                                <tr class="hover:bg-pink-50/30">
                                    <td class="p-5 font-bold text-gray-800">
                                        {{ $details['name'] }}
                                    </td>
                                    <td class="p-5 text-gray-600">{{ $details['price'] }} DH</td>
                                    <td class="p-5 text-center">{{ $details['quantity'] }}</td>
                                    <td class="p-5 text-pink-600 font-bold">{{ $subtotal }} DH</td>
                                    <td class="p-5">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="text-red-400 hover:text-red-600">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-pink-100">
                    <h3 class="text-xl font-bold mb-6 text-gray-800">Résumé</h3>
                    <div class="border-t border-pink-50 pt-4 flex justify-between items-center">
                        <span class="text-lg font-bold">Total TTC</span>
                        <span class="text-3xl font-black text-pink-600">{{ $total }} DH</span>
                    </div>
                    <button class="w-full bg-pink-500 text-white font-bold py-4 rounded-xl mt-6 shadow-lg shadow-pink-200">
                        Payer maintenant
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="text-center p-20 bg-white rounded-3xl shadow-sm border border-pink-50">
            <h3 class="text-2xl font-bold text-gray-800">Votre panier est vide 🌸</h3>
            <a href="{{ url('/') }}" class="mt-4 inline-block bg-pink-500 text-white px-8 py-3 rounded-xl font-bold">Découvrir nos bouquets</a>
        </div>
    @endif
</div>
@endsection