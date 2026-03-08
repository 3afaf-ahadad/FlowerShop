<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $client = Client::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
        ]);

        $order = Order::create([
            'client_id' => $client->id
        ]);

        foreach(session('cart') as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'flower_id' => $item['id'],
                'quantity' => $item['quantity']
            ]);
        }

        // Envoi email
        Mail::to($client->email)->send(new OrderConfirmed($order));

        // Vider panier
        session()->forget('cart');

        return view('merci');
    }
}