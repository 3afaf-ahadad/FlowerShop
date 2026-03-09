<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FlowerAtelier 🌸</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700|figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdfbfb] antialiased">

    @if(session('success'))
    <div id="flash-message" class="fixed top-24 right-10 z-[60] transform transition-all duration-500 ease-in-out">
        <div class="bg-white/90 backdrop-blur-md border-l-4 border-pink-400 shadow-2xl rounded-2xl px-8 py-4 flex items-center space-x-4 border border-pink-50">
            <div class="bg-pink-100 p-2 rounded-full">
                <span class="text-xl">✨</span>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-widest font-bold text-gray-400">Succès</p>
                <p class="text-sm text-gray-700 font-serif italic">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('flash-message').remove()" class="text-gray-300 hover:text-pink-400 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('flash-message');
            if(msg) {
                msg.style.opacity = '0';
                msg.style.transform = 'translateX(20px)';
                setTimeout(() => msg.remove(), 500);
            }
        }, 4000);
    </script>
    @endif

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-serif font-bold text-gray-800 tracking-tighter">
                Flower<span class="text-pink-400 italic">Atelier</span>
            </a>

            <div class="flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-[11px] uppercase tracking-[0.2em] font-bold text-gray-600 hover:text-pink-400 transition">Boutique</a>
                
                <a href="{{ route('cart.index') }}" class="relative group p-2">
                    <span class="text-2xl group-hover:scale-110 transition-transform duration-300 block">🛒</span>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] h-[18px] flex items-center justify-center shadow-lg border-2 border-white">
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

    <footer class="bg-white border-t border-gray-100 py-12 mt-20">
        <div class="text-center">
            <p class="font-serif italic text-gray-400">© 2026 FlowerAtelier. Fait avec amour 🌸</p>
        </div>
    </footer>

</body>
</html>