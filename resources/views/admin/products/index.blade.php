<div class="p-8 bg-pink-50 min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-pink-600">Admin Dashboard - Flowers</h1>
        <a href="{{ route('products.create') }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
            + Ajouter une Fleur
        </a>
    </div>

    <table class="w-full bg-white rounded-xl shadow-md overflow-hidden">
        <thead class="bg-pink-100 text-pink-700">
            <tr>
                <th class="p-4 text-left">Image</th>
                <th class="p-4 text-left">Nom</th>
                <th class="p-4 text-left">Prix</th>
                <th class="p-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b border-pink-50 hover:bg-pink-50">
                <td class="p-4">
                    <img src="{{ asset('storage/products/' . $product->image) }}" class="w-16 h-16 object-cover rounded-lg">
                </td>
                <td class="p-4 font-semibold">{{ $product->name }}</td>
                <td class="p-4 text-gray-600">{{ $product->price }} DH</td>
                <td class="p-4 text-center">
                    <button class="text-blue-500">Edit</button> | 
                    <button class="text-red-500">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>