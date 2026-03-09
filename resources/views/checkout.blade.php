@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fefaf9] py-16">
    <div class="max-w-3xl mx-auto px-6">

        <div class="text-center mb-16">
            <h1 style="font-family: 'Playfair Display', serif;" class="text-5xl italic text-gray-800 mb-3">
                Finaliser la Commande
            </h1>

            <div class="flex justify-center items-center space-x-2">
                <span class="h-[1px] w-8 bg-pink-100"></span>
                <span class="text-pink-300 text-[10px] uppercase tracking-[0.4em] font-semibold">
                    L'Atelier des Fleurs
                </span>
                <span class="h-[1px] w-8 bg-pink-100"></span>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-md p-12 rounded-[3rem] border border-pink-50 shadow-xl">

            <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                @csrf

                <input type="text" name="nom" placeholder="Nom" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="prenom" placeholder="Prenom" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="email" name="email" placeholder="Email" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="telephone" placeholder="Telephone" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="adresse" placeholder="Adresse" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <input type="text" name="ville" placeholder="Ville" required
                class="w-full border border-pink-100 rounded-full px-6 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200 bg-[#fdf2f5]">

                <button type="submit"
                class="w-full bg-pink-500 hover:bg-white hover:text-pink-500 text-white py-5 rounded-2xl font-bold text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                    Commander
                </button>

            </form>

        </div>

    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap');
</style>

@endsection