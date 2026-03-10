@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Liste des Commandes</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Référence</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td><strong>{{ $order->reference }}</strong></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>{{ $order->total_price }} DH</td>
                    <td>
                        <span class="badge {{ $order->status == 'en attente' ? 'bg-warning' : 'bg-success' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Voir Détails
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection