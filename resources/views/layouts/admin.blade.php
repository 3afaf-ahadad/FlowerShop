<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers Dashboard - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex">

    <aside class="w-64 min-h-screen bg-white border-r border-gray-200">
        <div class="p-6 text-2xl font-serif font-bold text-pink-600">FLOWERS</div>
        <nav class="mt-10 px-4">
            <a href="/admin/dashboard" class="block py-2.5 px-4 rounded transition hover:bg-pink-50 hover:text-pink-600">📊 Tableau de Bord</a>
            <a href="/admin/products" class="block py-2.5 px-4 rounded transition hover:bg-pink-50 hover:text-pink-600">🌸 Gestion Produits</a>
            <a href="/admin/categories" class="block py-2.5 px-4 rounded transition hover:bg-pink-50 hover:text-pink-600">🏷️ Catégories</a>
            <a href="/admin/orders" class="block py-2.5 px-4 rounded transition hover:bg-pink-50 hover:text-pink-600">🛒 Commandes</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-10">
                @csrf
                <button type="submit" class="w-full text-left py-2.5 px-4 text-red-500 hover:bg-red-50">Déconnexion</button>
            </form>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>