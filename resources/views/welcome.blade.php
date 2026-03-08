@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fefaf9] py-12">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">Finaliser votre commande</h1>
            <div class="flex justify-center items-center space-x-2">
                <span class="h-[1px] w-8 bg-pink-100"></span>
                <span class="text-pink-300 text-[10px] uppercase tracking-[0.4em] font-semibold">L'Atelier des Fleurs</span>
                <span class="h-[1px] w-8 bg-pink-100"></span>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-md p-10 rounded-[3rem] border border-pink-50 shadow-xl">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Nom</label>
                        <input type="text" name="nom" required class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
                    </div>
                    <div>
                        <label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Prénom</label>
                        <input type="text" name="prenom" required class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
                    </div>
                </div>
                <div class="mt-6">
                    <label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Adresse</label>
                    <input type="text" name="adresse" required class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
                </div>
                <div class="mt-6">
                    <label class="text-[10px] text-pink-400 uppercase tracking-widest font-bold">Téléphone</label>
                    <input type="text" name="telephone" required class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none focus:border-pink-300">
                </div>
                <div class="mt-12 text-center">
                    <button type="submit" class="bg-pink-500 hover:bg-gray-900 text-white px-12 py-5 rounded-full font-bold text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                        Valider la commande
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection