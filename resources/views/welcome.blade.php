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


<div id="boutique" class="bg-[#fefaf9] py-24">
<div class="max-w-7xl mx-auto px-6">
        
<div class="flex flex-col items-center mb-16 md:mb-24 text-center">
<span class="text-pink-400 text-[10px] font-bold tracking-[0.5em] uppercase mb-4">La Boutique</span>

<h2 class="text-3xl md:text-5xl font-serif text-gray-900 tracking-tight italic">
Nos Créations Signature
</h2>

<div class="w-12 h-[1px] bg-pink-200 mt-6"></div>
</div>


@if(session('success'))
<div class="max-w-md mx-auto bg-green-50 text-green-700 px-6 py-3 rounded-full text-center mb-12 text-sm border border-green-100 animate-fade-in">
✨ {{ session('success') }}
</div>
@endif


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 md:gap-14">

@foreach($fleurs as $product)

<div class="group flex flex-col items-center">


<div class="relative aspect-[3/4] rounded-[4rem] overflow-hidden bg-white shadow-sm group-hover:shadow-2xl transition-all duration-1000 border border-pink-50/50">

<img src="{{ asset('storage/' . $product->image) }}" 
class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 group-hover:scale-110 transition duration-[1.5s] ease-out"
onerror="this.src='https://placehold.co/600x800?text={{ $product->nom }}'">

<div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>


<form action="{{ route('cart.add', $product->id) }}" method="POST"
class="absolute inset-x-10 bottom-10 translate-y-20 group-hover:translate-y-0 transition-all duration-700 ease-out z-30">

@csrf

<button type="submit"
class="w-full bg-white/90 backdrop-blur-md text-gray-900 py-5 rounded-3xl font-bold text-[10px] uppercase tracking-[0.2em] hover:bg-pink-500 hover:text-white transition-all shadow-xl">

Ajouter au Panier

</button>

</form>

</div>


<div class="mt-10 text-center">

<span class="text-[9px] text-pink-300 uppercase tracking-[0.5em] font-bold block mb-3 italic">
Artisanal
</span>

<h3 class="text-2xl text-gray-800 italic mb-3 group-hover:text-pink-400 transition-colors duration-500 font-serif">
{{ $product->nom }}
</h3>

<div class="flex items-center justify-center space-x-4">

<span class="h-[1px] w-4 bg-gray-200 group-hover:w-8 transition-all duration-700"></span>

<span class="text-lg font-light text-gray-500 italic">
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


<footer class="bg-gray-50 border-t border-gray-100 py-12">

<div class="container mx-auto px-6 text-center">

<p class="text-[10px] text-gray-400 tracking-[0.3em] uppercase">
©️ 2026 FlowerAtelier — la vie en rose...tout simplement🌷
</p>

</div>

</footer>


<style>

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&family=Montserrat:wght@300;400;700&display=swap');

h1, h2, h3, .font-serif {
font-family: 'Playfair Display', serif;
}

body {
font-family: 'Montserrat', sans-serif;
scroll-behavior: smooth;
}

.animate-fade-in {
animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {

from {
opacity:0;
transform:translateY(20px);
}

to {
opacity:1;
transform:translateY(0);
}

}

@media (hover: none) {

.group-hover\:translate-y-0 {
transform: translateY(0);
}

}

</style>

@endsection