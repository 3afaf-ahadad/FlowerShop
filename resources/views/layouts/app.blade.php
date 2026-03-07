<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Atelier Floral</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fefaf9; font-family: 'Montserrat', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="antialiased text-gray-800">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-pink-50">
        <div class="max-w-6xl mx-auto px-8 h-20 flex justify-between items-center">
            <a href="/" class="font-serif text-2xl italic tracking-tighter">FlowerAtelier</a>
            
            <div class="flex items-center space-x-8 text-[11px] uppercase tracking-[0.2em] font-semibold text-gray-500">
                <a href="/" class="hover:text-pink-400 transition">Boutique</a>
                <a href="/cart" class="flex items-center group">
                    <span class="mr-2">Panier</span>
                    <div class="relative">
                        <svg class="w-5 h-5 group-hover:text-pink-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        @if(session('cart'))
                            <span class="absolute -top-2 -right-2 bg-pink-400 text-white text-[9px] w-4 h-4 rounded-full flex items-center justify-center">
                                {{ count(session('cart')) }}
                            </span>
                        @endif
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto mt-6 px-6">
        @if(session('success'))
            <div class="bg-white border-l-4 border-green-300 p-4 rounded-r-xl shadow-sm text-xs text-gray-600">
                ✨ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-white border-l-4 border-pink-300 p-4 rounded-r-xl shadow-sm text-xs text-gray-600">
                🌸 {{ session('error') }}
            </div>
        @endif
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="py-12 text-center border-t border-pink-50 mt-20">
        <p class="font-serif italic text-gray-400 text-sm">Designé avec amour pour Nouhaila</p>
    </footer>

</body>
</html>