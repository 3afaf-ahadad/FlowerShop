<div class="p-8 bg-pink-50 min-h-screen">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-lg border border-pink-100">
        <h1 class="text-2xl font-bold text-pink-600 mb-6">🌸 Ajouter une nouvelle Fleur</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf <div>
                <label class="block text-pink-700 font-semibold mb-1">Nom de la fleur</label>
                <input type="text" name="name" required class="w-full border-pink-200 rounded-lg focus:ring-pink-500 focus:border-pink-500 p-2 shadow-sm">
            </div>

            <div>
                <label class="block text-pink-700 font-semibold mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full border-pink-200 rounded-lg focus:ring-pink-500 p-2 shadow-sm"></textarea>
            </div>

            <div>
                <label class="block text-pink-700 font-semibold mb-1">Prix (DH)</label>
                <input type="number" step="0.01" name="price" required class="w-full border-pink-200 rounded-lg focus:ring-pink-500 p-2 shadow-sm">
            </div>

            <div>
                <label class="block text-pink-700 font-semibold mb-1">Photo de la fleur</label>
                <input type="file" name="image" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 cursor-pointer">
            </div>

            <div class="pt-4 text-center">
                <button type="submit" class="bg-pink-500 text-white px-8 py-3 rounded-full font-bold shadow-md hover:bg-pink-600 hover:scale-105 transition transform duration-200">
                    Enregistrer la Fleur 
                </button>
            </div>
        </form>
    </div>
</div>