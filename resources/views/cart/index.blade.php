@extends('layouts.app')

@section('content')
<<<<<<< HEAD
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
                           <a href="{{ route('checkout') }}" class="btn btn-primary">
    Commander Maintenant 🌸
</a>
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
=======
<div class="container mx-auto p-6 max-w-5xl">
    <h1 class="text-4xl font-extrabold mb-8 text-gray-800">Mon Panier <span class="text-pink-500">🌸</span></h1>

    @if(isset($cart) && count($cart) > 0)
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
                    
                    {{-- HNA FIN KAN L-GHALAT: Khdemna b $cart machi $products --}}
                    @foreach($cart as $id => $details)
                        @php 
                            $price = $details['price'] ?? 0;
                            $quantity = $details['quantity'] ?? 1;
                            $subtotal = $price * $quantity;
                            $totalGeneral += $subtotal;
                        @endphp
                        <tr class="item-row hover:bg-pink-50/30 transition-colors" data-price="{{ $price }}">
                            <td class="p-6 flex items-center gap-4">
                                <img src="{{ asset('products/' . ($details['image'] ?? 'default.jpg')) }}" 
                                     class="w-20 h-20 object-cover rounded-2xl shadow-md border-2 border-white">
                                <span class="font-bold text-gray-800 text-lg">{{ $details['name'] }}</span>
                            </td>
                            <td class="p-6 text-center text-gray-600 font-medium">
                                <span class="unit-price">{{ number_format($price, 2) }}</span> DH
                            </td>
                            <td class="p-6 text-center">
                                <form action="{{ route('cart.update') }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $quantity }}" 
                                           min="1" class="qty-input w-16 border-2 border-gray-200 rounded-xl p-2 text-center focus:border-pink-400 focus:ring-0 outline-none transition">
                                    <button type="submit" class="block text-[10px] text-blue-400 mt-1 uppercase font-bold tracking-tighter hover:text-blue-600">Sauvegarder</button>
                                </form>
                            </td>
                            <td class="p-6 text-right font-black text-pink-600 text-xl">
                                <span class="line-subtotal">{{ number_format($subtotal, 2) }}</span> DH
                            </td>
                            <td class="p-6 text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-gray-300 hover:text-red-500 transition-transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

        <div class="mt-8 flex flex-col items-end gap-4">
            <div class="bg-gray-900 text-white p-8 rounded-3xl shadow-xl w-full md:w-96">
                <p class="text-gray-400 uppercase text-xs tracking-widest mb-2">Total de votre panier</p>
                <h2 class="text-5xl font-black"><span id="total-grand">{{ number_format($totalGeneral, 2) }}</span> <span class="text-pink-500 text-2xl font-bold">DH</span></h2>
                <a href="{{ route('checkout') }}" class="block text-center bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl mt-6 font-bold text-lg transition shadow-lg shadow-pink-500/30 transform hover:-translate-y-1">
                    Commander ✨
                </a>
            </div>
        </div>
    @else
        <div class="text-center py-32 bg-white rounded-3xl border-2 border-dashed border-gray-100">
            <p class="text-gray-400 text-xl italic mb-8">Votre panier est encore vide... 🥀</p>
            <a href="{{ route('products.index') }}" class="bg-gray-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-pink-500 transition shadow-xl">
                Voir nos fleurs 🌸
            </a>
        </div>
    @endif
</div>

<script>
    // JS bach y-tzad l-prix automatique f l-ecran
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('input', function() {
            const row = this.closest('.item-row');
            const price = parseFloat(row.getAttribute('data-price'));
            const qty = parseInt(this.value);
            
            if (qty > 0) {
                const subtotal = price * qty;
                row.querySelector('.line-subtotal').innerText = subtotal.toLocaleString('en-US', {minimumFractionDigits: 2});
                
                let newTotal = 0;
                document.querySelectorAll('.line-subtotal').forEach(st => {
                    newTotal += parseFloat(st.innerText.replace(/,/g, ''));
                });
                document.getElementById('total-grand').innerText = newTotal.toLocaleString('en-US', {minimumFractionDigits: 2});
            }
        });
    });
</script>
>>>>>>> nouhaila
@endsection