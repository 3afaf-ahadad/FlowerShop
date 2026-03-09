@extends('layouts.app')

@section('content')

<div class="confirmation-container">

<h1>Commande confirmée 🌸</h1>

<p>Merci pour votre achat</p>

<h3>Référence de commande :</h3>

<div class="reference">
{{ $reference }}
</div>

<h2>Résumé des produits</h2>

@foreach($cart as $item)

<div class="product">

<span>
{{ $item['name'] }} x {{ $item['quantity'] }}
</span>

<span>
{{ $item['price'] * $item['quantity'] }} DH
</span>

</div>

@endforeach


<div class="total">

<strong>Total : {{ $total }} DH</strong>

</div>

<a href="/" class="btn">Retour à la boutique</a>

</div>


<style>

.confirmation-container{
max-width:700px;
margin:auto;
background:white;
padding:40px;
border-radius:20px;
box-shadow:0 10px 40px rgba(0,0,0,0.1);
text-align:center;
}

.reference{
background:#fde8ef;
padding:10px;
border-radius:10px;
margin-bottom:20px;
font-weight:bold;
}

.product{
display:flex;
justify-content:space-between;
margin-bottom:10px;
}

.total{
margin-top:20px;
font-size:20px;
}

.btn{
display:inline-block;
margin-top:30px;
background:#ec4899;
color:white;
padding:10px 20px;
border-radius:10px;
text-decoration:none;
}

</style>

@endsection