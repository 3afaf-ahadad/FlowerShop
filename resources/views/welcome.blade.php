@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="relative h-[60vh] md:h-[500px] w-full overflow-hidden">
    <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=1600&q=80" 
         class="w-full h-full object-cover brightness-90" 
         alt="Flower Atelier Hero">
    <div class="absolute inset-0 bg-black/20 flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-white text-4xl md:text-6xl font-serif mb-4 drop-shadow-md">
            L'Éphémère <span class="italic text-pink-100">Beauté</span>
        </h1>
        <p class="text-white/90 text-xs md:text-sm tracking-[0.3em] uppercase max-w-md font-light">
            Des compositions florales d'exception pour vos moments précieux
        </p>
    </div>
</div>

<div class="bg-white">
    <div class="container mx-auto px-4 py-16 md:py-24 max-w-7xl">
        
        <div class="flex flex-col items-center mb-16 md:mb-24">
            <span class="text-pink-400 text-[10px] font-bold tracking-[0.5em] uppercase mb-4">La Boutique</span>
            <h2 class="text-3xl md:text-4xl font-serif text-gray-900 tracking-tight">Nos Créations Signature</h2>
            <div class="w-10 h-[1px] bg-pink-200 mt-6"></div>
        </div>

        @if(session('success'))
            <div class="max-w-md mx-auto bg-green-50 text-green-700 px-6 py-3 rounded-full text-center mb-12 text-sm border border-green-100 animate-fade-in">
                ✨ {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 md:gap-14">
            @foreach($products as $product)
                <div class="group flex flex-col items-center">
                    
                    <div class="relative w-full aspect-[4/5] overflow-hidden rounded-[3rem] bg-gray-50 shadow-sm transition-all duration-700 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                             onerror="this.src='https://placehold.co/600x800?text={{ $product->nom }}'">
                        
                        <div class="absolute inset-x-0 bottom-0 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-white/90 backdrop-blur-md text-gray-900 py-4 rounded-2xl font-bold text-[10px] uppercase tracking-widest hover:bg-gray-900 hover:text-white transition-all shadow-xl active:scale-95">
                                    Ajouter au Panier +
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-8 text-center px-2">
                        <h3 class="text-[11px] font-bold tracking-[0.2em] text-gray-500 uppercase mb-2 group-hover:text-pink-400 transition-colors">
                            {{ $product->nom }}
                        </h3>
                        <p class="text-gray-900 font-serif italic text-xl">
                            {{ number_format($product->prix, 2) }} <span class="text-xs not-italic font-sans text-gray-400">DH</span>
                        </p>
                    </div>
                </div>
            @endforeach
=======
<div class="relative min-h-[80vh] flex items-center bg-[#fffafa]">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/40 to-transparent z-10"></div>
        {{-- Tqdri t-bdli had l-image b chi waheda 3ndek f public/images --}}
        <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" 
             class="w-full h-full object-cover opacity-80" alt="Hero Flower">
    </div>

    <div class="max-w-7xl mx-auto px-8 relative z-20">
        <span class="text-pink-300 text-[11px] uppercase tracking-[0.7em] font-bold mb-6 block animate-fade-in">Collection Signature 2026</span>
        <h1 style="font-family: 'Playfair Display', serif;" class="text-7xl md:text-8xl italic text-gray-800 leading-tight mb-8">
            Poésie f <br><span class="text-pink-400">chaque Bouquet</span>
        </h1>
        <p class="text-gray-500 font-serif italic text-xl mb-12 max-w-lg leading-relaxed">
            Des compositions artisanales nées de la passion, livrées avec tendresse chez vous.
        </p>
        <div class="flex items-center space-x-8">
            <a href="#boutique" class="bg-gray-900 text-white px-12 py-5 rounded-full font-bold text-[10px] uppercase tracking-[0.3em] hover:bg-pink-400 transition-all duration-700 shadow-2xl hover:-translate-y-2">
                Découvrir l'Atelier
            </a>
            <div class="hidden md:flex items-center space-x-3 text-pink-200">
                <span class="h-[1px] w-12 bg-current"></span>
                <span class="text-[9px] uppercase tracking-widest font-black">Luxe & Nature</span>
            </div>
>>>>>>> nouhaila
        </div>
    </div>
</div>

<<<<<<< HEAD
<footer class="bg-gray-50 border-t border-gray-100 py-12">
    <div class="container mx-auto px-6 text-center">
        <p class="text-[10px] text-gray-400 tracking-[0.3em] uppercase">© 2024 FlowerAtelier — Créé avec passion</p>
    </div>
</footer>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&family=Montserrat:wght@300;400;700&display=swap');
    
    h1, h2, .font-serif { font-family: 'Playfair Display', serif; }
    body { font-family: 'Montserrat', sans-serif; }

    /* Custom Animation */
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Support pour les écrans tactiles (Hover effect f mobile) */
    @media (hover: none) {
        .group-hover\:translate-y-0 {
            transform: translateY(0);
        }
    }
=======
<div id="boutique" class="bg-[#fefaf9] py-32">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-28">
            <h2 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-4">L'Éclat de Rose</h2>
            <div class="flex justify-center items-center space-x-4">
                <span class="h-[1px] w-12 bg-pink-100"></span>
                <div class="w-2 h-2 rounded-full bg-pink-200"></div>
                <span class="h-[1px] w-12 bg-pink-100"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16 gap-y-32">
            @foreach($fleurs as $product)
            <div class="group flex flex-col">
                {{-- Card Image --}}
                <div class="relative aspect-[3/4] rounded-[4rem] overflow-hidden bg-white shadow-sm group-hover:shadow-2xl transition-all duration-1000 border border-pink-50/50">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="w-full h-full object-cover grayscale-[0.3] group-hover:grayscale-0 group-hover:scale-110 transition duration-[1.5s] ease-out">
                    
                    <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" 
                          class="absolute inset-x-10 bottom-10 translate-y-20 group-hover:translate-y-0 transition-all duration-700 ease-out z-30">
                        @csrf
                        <button type="submit" class="w-full bg-white/90 backdrop-blur-md text-gray-900 py-5 rounded-3xl font-bold text-[10px] uppercase tracking-[0.2em] hover:bg-pink-500 hover:text-white transition-all shadow-xl">
                            Ajouter au Panier
                        </button>
                    </form>
                </div>

                {{-- Info Produit --}}
                <div class="mt-12 text-center">
                    <span class="text-[9px] text-pink-300 uppercase tracking-[0.5em] font-bold block mb-4 italic">Artisanal</span>
                    <h3 style="font-family: 'Playfair Display', serif;" class="text-3xl text-gray-800 italic mb-4 group-hover:text-pink-400 transition-colors duration-500">
                        {{ $product->nom }}
                    </h3>
                    <div class="flex items-center justify-center space-x-4">
                        <span class="h-[1px] w-4 bg-gray-200 group-hover:w-8 transition-all duration-700"></span>
                        <span class="text-xl font-light text-gray-500 italic tracking-tighter">
                            {{ number_format($product->prix, 2, '.', ' ') }} DH
                        </span>
                        <span class="h-[1px] w-4 bg-gray-200 group-hover:w-8 transition-all duration-700"></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&display=swap');
    
    html { scroll-behavior: smooth; }
    
    .animate-fade-in {
        animation: fadeIn 1.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
>>>>>>> nouhaila
</style>
@endsection