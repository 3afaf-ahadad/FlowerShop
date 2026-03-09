@extends('layouts.app')

@section('content')
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
            @foreach($fleurs as $product)
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
        </div>
    </div>
</div>

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
</style>
@endsection