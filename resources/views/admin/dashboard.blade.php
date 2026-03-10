@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tableau de Bord - Vue d'ensemble</h1>

<<<<<<< HEAD
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 uppercase font-semibold">Total Produits</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $totalProducts }}</h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 uppercase font-semibold">Total Commandes</p>
            <h2 class="text-3xl font-bold text-green-600">{{ $totalOrders }}</h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 uppercase font-semibold">Revenus (DH)</p>
            <h2 class="text-3xl font-bold text-purple-600">{{ number_format($totalRevenue, 2) }}</h2>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-red-100 overflow-hidden">
        <div class="bg-red-50 px-6 py-4 border-b border-red-100">
            <h3 class="text-lg font-bold text-red-700">⚠️ Alertes Stock Faible</h3>
        </div>
        <div class="p-6">
            @if($lowStockProducts->isEmpty())
                <p class="text-gray-500">Tout est en stock ! ✅</p>
            @else
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-sm uppercase">
                            <th class="pb-3">Produit</th>
                            <th class="pb-3 text-center">Stock restant</th>
                            <th class="pb-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($lowStockProducts as $product)
                        <tr>
                            <td class="py-3 font-medium">{{ $product->name }}</td>
                            <td class="py-3 text-center">
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">
                                    {{ $product->stock }} restant(s)
                                </span>
                            </td>
                            <td class="py-3 text-right">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Réapprovisionner</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
=======
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm uppercase">Produits en Stock</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalProducts }}</p>
        {{-- ✅ Comment: $totalProducts was added in DashboardController as Product::count() --}}
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm uppercase">Commandes Totales</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalOrders }}</p>
        {{-- ✅ Comment: $totalOrders added via Order::count() in DashboardController --}}
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-red-600">
        <p class="text-gray-500 text-sm uppercase">Alertes Stock Faible</p>
        <p class="text-3xl font-bold">{{ $lowStockCount }}</p>
        {{-- ✅ Comment: $lowStockCount added via Product::where('stock','<',5)->count() --}}
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
    <h2 class="text-xl mb-4 font-semibold">Produits à réapprovisionner</h2>
    <ul>
        @foreach($lowStockProducts as $product)
            <li>{{ $product->name }} ({{ $product->stock }} restant)</li>
        @endforeach
        {{-- ✅ Comment: $lowStockProducts added in DashboardController as Product::where('stock','<',5)->get() --}}
    </ul>
</div>
@endsection

>>>>>>> 71ae36b44f0bb1abab62d073365f2a909512db1d
