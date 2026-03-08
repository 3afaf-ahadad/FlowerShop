<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'adresse' => 'required',
        'ville' => 'required',
    ]);

    $cart = session()->get('cart', []);

    if(empty($cart)){
        return back()->with('error','Panier vide');
    }

    $client = Client::create([
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'email'=>$request->email,
        'telephone'=>$request->telephone,
        'adresse'=>$request->adresse,
        'ville'=>$request->ville
    ]);

    $total = 0;
    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    $order = Order::create([
        'client_id'=>$client->id,
        'total_price'=>$total,
        'status'=>'pending'
    ]);

    foreach($cart as $item){
        OrderItem::create([
            'order_id'=>$order->id,
            'product_id'=>$item['id'],
            'quantity'=>$item['quantity'],
            'price'=>$item['price']
        ]);
    }

    session()->forget('cart');

    return redirect('merci');
}

}