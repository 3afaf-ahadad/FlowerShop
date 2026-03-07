@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-pink-600 mb-4">Mon Panier 🛒</h2>
    
    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['price'] }} DH</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>{{ $details['price'] * $details['quantity'] }} DH</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf @method('DELETE')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-sm btn-danger">X</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end">
            <h3>Total: <strong>{{ $total }} DH</strong></h3>
            <a href="#" class="btn btn-success">Commander 💳</a>
        </div>
    @else
        <p>Votre panier est vide. <a href="{{ url('/') }}">Retour aux fleurs.</a></p>
    @endif
</div>
@endsection