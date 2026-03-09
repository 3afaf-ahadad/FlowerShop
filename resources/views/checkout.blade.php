@extends('layouts.app')

@section('content')

<div class="min-h-screen checkout-bg py-16 flex items-center justify-center">

<div class="w-full max-w-6xl checkout-card p-12">

<div class="text-center mb-14">
<h1 class="checkout-title text-5xl mb-4">Finaliser la commande</h1>

<div class="flex justify-center items-center space-x-3">
<span class="line"></span>
<p class="brand">L'Atelier des Fleurs</p>
<span class="line"></span>
</div>

</div>

<div class="grid md:grid-cols-2 gap-14">

<!-- FORM -->

<form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
@csrf

<div class="input-group">
<input type="text" name="nom" placeholder="Nom complet" required>
</div>

<div class="input-group">
<input type="email" name="email" placeholder="Email" required>
</div>

<div class="input-group">
<input type="text" name="telephone" placeholder="Téléphone" required>
</div>

<div class="input-group">
<input type="text" name="adresse" placeholder="Adresse de livraison" required>
</div>

<button type="submit" class="checkout-btn">
Valider la commande
</button>

<p class="secure">Paiement sécurisé • SSL</p>

</form>


<!-- RESUME -->

<div class="resume-card">

<h2 class="resume-title">Résumé de la commande</h2>

@php $total = 0; @endphp

@if(session('cart'))

@foreach(session('cart') as $item)

<div class="resume-item">

<div>
<p class="product-name">{{ $item['name'] }}</p>
<span class="product-qty">Quantité: {{ $item['quantity'] }}</span>
</div>

<span class="price">
{{ $item['price'] * $item['quantity'] }} DH
</span>

</div>

@php $total += $item['price'] * $item['quantity']; @endphp

@endforeach

@endif

<div class="resume-divider"></div>

<div class="resume-total">

<span>Total</span>
<span class="total-price">{{ $total }} DH</span>

</div>

</div>

</div>

</div>

</div>


<style>

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;500&display=swap');

.checkout-bg{
background:#fefaf9;
font-family:'Inter',sans-serif;
}

.checkout-card{
background:white;
border-radius:3rem;
box-shadow:0 30px 60px rgba(0,0,0,0.06);
border:1px solid #fde8ef;
}

.checkout-title{
font-family:'Playfair Display',serif;
font-style:italic;
color:#1f2937;
}

.brand{
font-size:11px;
letter-spacing:0.4em;
text-transform:uppercase;
color:#f9a8d4;
font-weight:600;
}

.line{
height:1px;
width:40px;
background:#fbcfe8;
}

/* Inputs */

.input-group input{
width:100%;
border:1px solid #fbcfe8;
padding:16px 22px;
border-radius:40px;
font-size:14px;
transition:all .3s;
background:#fff;
}

.input-group input:focus{
outline:none;
border-color:#f472b6;
box-shadow:0 0 0 4px rgba(244,114,182,0.15);
}

/* Button */

.checkout-btn{
width:100%;
background:#ec4899;
color:white;
padding:18px;
border-radius:18px;
font-size:12px;
letter-spacing:.3em;
text-transform:uppercase;
font-weight:700;
transition:.4s;
box-shadow:0 15px 30px rgba(236,72,153,.3);
}

.checkout-btn:hover{
background:#db2777;
transform:translateY(-3px);
}

/* Secure text */

.secure{
text-align:center;
font-size:10px;
margin-top:10px;
letter-spacing:.15em;
text-transform:uppercase;
color:#9ca3af;
}

/* Resume */

.resume-card{
background:#fafafa;
padding:30px;
border-radius:25px;
border:1px solid #f3f4f6;
}

.resume-title{
font-weight:700;
margin-bottom:25px;
color:#374151;
}

.resume-item{
display:flex;
justify-content:space-between;
margin-bottom:16px;
align-items:center;
}

.product-name{
font-size:14px;
color:#374151;
font-weight:500;
}

.product-qty{
font-size:11px;
color:#9ca3af;
}

.price{
font-weight:700;
color:#111827;
}

.resume-divider{
height:1px;
background:#e5e7eb;
margin:25px 0;
}

.resume-total{
display:flex;
justify-content:space-between;
font-size:18px;
font-weight:700;
}

.total-price{
color:#ec4899;
font-size:22px;
font-family:'Playfair Display',serif;
}

</style>

@endsection