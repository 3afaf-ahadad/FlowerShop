<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowerAtelier 🌸</title>
    {{-- Darouri ykoun had l-vite hna --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdfbfb] antialiased">
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-serif font-bold text-gray-800 tracking-tighter">
                Flower<span class="text-pink-400 italic">Atelier</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="{{ url('/') }}" class="hidden md:block text-[10px] uppercase tracking-[0.2em] font-bold text-gray-400 hover:text-pink-500 transition">Boutique</a>
                
                {{-- Bouton Panier --}}
                <a href="{{ route('cart.index') }}" class="relative p-2 bg-pink-50 rounded-full text-pink-500 hover:bg-pink-500 hover:text-white transition-all">
                    <span class="text-xl">🛒</span>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-gray-900 text-white text-[8px] font-bold h-4 w-4 flex items-center justify-center rounded-full border border-white">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>