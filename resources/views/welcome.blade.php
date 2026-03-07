<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<title> 🌸FlowerShop🌷 </title>
<script src="https://cdn.tailwindcss.com"></script>

<head>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

<body class="bg-pink-50 p-10">
    <h1 class="text-4xl font-bold text-pink-600 mb-8 text-center"> 🌷 Nos Magnifiques Bouquets 🌸</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($fleurs as $fleur)
        <div class="bg-white p-6 rounded-lg shadow-lg border-2 border-pink-200">

            <h2 class="text-2xl font-semibold text-gray-800"> {{ $fleur->nom }} </h2>
            <p class="text-gray-600 my-2"> {{ $fleur->description }} </p>
            <span class="text-pink-500 font-bold text-xl"> {{ $fleur->prix }} DH</span>
            <p class="text-sm text-gray-400 mt-2"> Stock disponible: {{ $fleur->stock }} </p>
            <img src="/storage/products/{$fleur->image}">
        </div>
        @endforeach

    </div>
</body>

</html>