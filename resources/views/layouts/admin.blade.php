<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin FlowerShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <nav class="w-64 bg-slate-900 text-white p-6">
            <h2 class="text-2xl font-bold mb-8 text-pink-500">🌸 Admin Panel</h2>
            <ul class="space-y-4">
                <li><a href="/admin" class="hover:text-pink-400">Tableau de bord</a></li>
                <li><a href="/admin/products" class="hover:text-pink-400">Produits</a></li>
                <li><a href="/admin/categories" class="hover:text-pink-400">Catégories</a></li>
                <li><a href="/admin/orders" class="hover:text-pink-400">Commandes</a></li>
                <li class="pt-10 border-t border-gray-700">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-400">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </nav>

        <main class="flex-1 p-10 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>