<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> 🌸 FlowerShop - Boutique de Fleurs </title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="bg-[#FFF5F7] min-h-screen">

    <nav class="bg-white/80 backdrop-blur-md shadow-sm border-b border-pink-100 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            
            <a href="{{ url('/') }}" class="flex items-center space-x-2 group">
                <span class="text-3xl">🌷</span>
                <span class="text-2xl font-black text-pink-600 tracking-tighter group-hover:text-pink-500 transition">
                    FlowerShop
                </span>
            </a>

            <div class="hidden md:flex items-center space-x-8 text-gray-600 font-semibold text-sm uppercase tracking-wider">
                <a href="{{ url('/') }}" class="hover:text-pink-500 transition border-b-2 border-transparent hover:border-pink-500 py-1">Boutique</a>
                <a href="#" class="hover:text-pink-500 transition border-b-2 border-transparent hover:border-pink-500 py-1">Nos Bouquets</a>
                <a href="#" class="hover:text-pink-500 transition border-b-2 border-transparent hover:border-pink-500 py-1">À propos</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('cart.index') }}" class="relative p-3 bg-pink-50 rounded-2xl hover:bg-pink-100 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    
                    @if(count(session('cart', [])) > 0)
                        <span class="absolute -top-1 -right-1 bg-pink-600 text-white text-[11px] font-bold h-5 w-5 flex items-center justify-center rounded-full border-2 border-white shadow-lg animate-pulse">
                            {{ count(session('cart', [])) }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mx-auto px-6 mt-6">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm flex items-center justify-between" role="alert">
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    <main class="py-10">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-pink-100 py-8 mt-20">
        <div class="container mx-auto px-6 text-center text-gray-400 text-sm font-medium">
            &copy; 2024 FlowerShop. Siyebtoh Nouhaila m3a l-team 🌸
        </div>
    </footer>

</body>
</html>