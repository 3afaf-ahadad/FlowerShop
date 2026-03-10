@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-serif mb-8">Bienvenue, Admin</h1>

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

