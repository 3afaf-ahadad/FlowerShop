<div class="bg-pink-50 p-8 rounded-lg shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-serif text-pink-600 mb-6">Détails de la livraison</h2>
    
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf 

        <div class="mb-4">
            <label class="block text-pink-400">Nom Complet</label>
            <input type="text" name="full_name" class="w-full border-pink-200 rounded-md p-2 focus:ring-pink-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-pink-400">Adresse</label>
            <textarea name="address" class="w-full border-pink-200 rounded-md p-2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-pink-400">Téléphone</label>
            <input type="text" name="phone" class="w-full border-pink-200 rounded-md p-2 focus:ring-pink-500" required>
        </div>

        <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-full hover:bg-pink-600 transition">
            Valider la commande
        </button>
    </form>
</div>