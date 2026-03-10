@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">Détails des Produits</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix Unitaire</th>
                            <th>Qté</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->price_at_purchase }} DH</td>
                            <td>x {{ $item->quantity }}</td>
                            <td>{{ $item->price_at_purchase * $item->quantity }} DH</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Infos Client & Statut</div>
            <div class="card-body">
                <p><strong>Nom:</strong> {{ $order->customer_name }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Adresse:</strong> {{ $order->address }}</p>
                <hr>
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label>Modifier le statut:</label>
                        <select name="status" class="form-select">
                            <option value="en attente" {{ $order->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                            <option value="validée" {{ $order->status == 'validée' ? 'selected' : '' }}>Validée</option>
                            <option value="expédiée" {{ $order->status == 'expédiée' ? 'selected' : '' }}>Expédiée</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection