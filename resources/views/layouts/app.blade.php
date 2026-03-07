<!DOCTYPE html>
<html>
<head>
    <title>FlowerShop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav> <a href="{{ url('/') }}">Accueil</a> | <a href="{{ url('/cart') }}">Panier</a> </nav>
    <hr>
    @yield('content')
</body>
</html>