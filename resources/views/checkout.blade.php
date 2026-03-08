@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fefaf9] py-12">
    <div class="max-w-5xl mx-auto px-6">
        
        <div class="text-center mb-16">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">
                Finaliser la commande
            </h1>

            <div class="flex justify-center items-center space-x-2">
                <span class="h-[1px] w-8 bg-pink-100"></span>
                <span class="text-pink-300 text-[10px] uppercase tracking-[0.4em] font-semibold">
                    L'Atelier des Fleurs
                </span>
                <span class="h-[1px] w-8 bg-pink-100"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- Formulaire client -->
            <div class="lg:col-span-8">

                <div class="bg-white/70 backdrop-blur-md p-10 rounded-[3rem] border border-pink-50 shadow-xl">

                <form action="{{ route('order.store') }}" method="POST">
                @csrf

                <div class="space-y-6">

                    <div>
                        <label class="text-xs text-gray-400 uppercase tracking-widest">Nom</label>
                        <input type="text" name="nom" required
                        class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none">
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 uppercase tracking-widest">Prénom</label>
                        <input type="text" name="prenom" required
                        class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none">
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 uppercase tracking-widest">Adresse</label>
                        <input type="text" name="adresse" required
                        class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none">
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 uppercase tracking-widest">Téléphone</label>
                        <input type="text" name="telephone" required
                        class="w-full mt-2 p-4 rounded-2xl border border-pink-100 bg-[#fdf2f5] focus:outline-none">
                    </div>

                </div>

                <div class="mt-10">
                    <button type="submit"
                    class="w-full bg-pink-500 hover:bg-white hover:text-pink-500 text-white py-5 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                        Valider la commande
                    </button>
                </div>

                </form>

                </div>

            </div>

        </div>

    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&display=swap');
</style>

@endsection