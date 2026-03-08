<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌸 Mon Atelier Floral 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fefaf9; font-family: 'Montserrat', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="antialiased text-gray-800">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-pink-50">
        <div class="max-w-6xl mx-auto px-8 h-20 flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="font-serif text-2xl italic tracking-tighter">FlowerAtelier</a>
            
            <div class="flex items-center space-x-8 text-[11px] uppercase tracking-[0.2em] font-semibold text-gray-500">
                <a href="{{ route('products.index') }}" class="hover:text-pink-400 transition">Boutique</a>
                <a href="{{ route('cart.index') }}" class="flex items-center group">
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

   <footer class="py-16 text-center border-t border-pink-50 mt-20 bg-white/30 backdrop-blur-sm">
    <div class="max-w-4xl mx-auto px-6">
        <div class="mb-8">
            <h2 style="font-family: 'Playfair Display', serif;" class="text-3xl italic text-pink-300 mb-2">L'Atelier des Fleurs</h2>
            <div class="flex justify-center items-center space-x-2">
                <span class="h-[1px] w-4 bg-pink-100"></span>
                <span class="text-[8px] text-gray-400 uppercase tracking-[0.5em] font-medium">Créations Artisanales</span>
                <span class="h-[1px] w-4 bg-pink-100"></span>
            </div>
        </div>

        <p class="font-serif italic text-gray-500 text-sm mb-6 leading-relaxed">
            Conçu avec amour par l'équipe :<br>
            <span class="text-gray-400 not-italic uppercase tracking-widest text-[10px]">
                Afaf &bull; Nouhaila &bull; Ghita &bull; Soukaina &bull; Farah
            </span>
        </p>

        <div class="pt-8 border-t border-pink-50/50">
            <p class="text-[9px] text-gray-300 uppercase tracking-widest">
                &copy; {{ date('Y') }} FleurShop &mdash; Tous droits réservés.
            </p>
        </div>
    </div>
</footer>

</body>
</html>