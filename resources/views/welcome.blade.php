<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title> 🌸FlowerShop🌷 </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
</head>

<body class="bg-pink-50 p-10">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-pink-600"> 🌷 Nos Magnifiques Bouquets 🌸</h1>
        <a href="{{ route('cart.index') }}" class="bg-white px-4 py-2 rounded-lg shadow border border-pink-200 font-bold text-pink-600">
            Voir mon Panier 🛒 ({{ count(session('cart', [])) }})
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($fleurs as $fleur)
        <div class="bg-white p-6 rounded-lg shadow-lg border-2 border-pink-200 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800"> {{ $fleur->nom }} </h2>
                <p class="text-gray-600 my-2"> {{ $fleur->description }} </p>
                <span class="text-pink-500 font-bold text-xl"> {{ $fleur->prix }} DH</span>
                <p class="text-sm text-gray-400 mt-2"> Stock disponible: {{ $fleur->stock }} </p>
            </div>

            <form action="{{ route('cart.add', $fleur->id) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                    Ajouter au Panier 🌸
                </button>
            </form>
        </div>
        @endforeach
    </div>
</body>
</html>