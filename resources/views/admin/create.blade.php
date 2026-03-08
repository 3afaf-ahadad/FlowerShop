<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-8 bg-pink-50 rounded-xl shadow-md border border-pink-100">
    @csrf
    <h2 class="text-2xl font-serif text-pink-700 mb-6 italic">Ajouter une Nouvelle Fleur</h2>

    <div class="mb-4">
        <label class="block text-pink-900 font-semibold">Nom de la Fleur</label>
        <input type="text" name="name" class="w-full border-pink-200 rounded-lg focus:ring-pink-500">
    </div>

    <div class="mb-4">
        <label class="block text-pink-900 font-semibold">Image de la Fleur</label>
        <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-pink-100 file:text-pink-700 hover:file:bg-pink-200">
    </div>

    <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg shadow-lg hover:bg-pink-700 transition">Enregistrer</button>
</form>