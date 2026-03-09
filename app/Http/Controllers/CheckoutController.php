<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{

public function index()
{
    $cart = session()->get('cart', []);
    return view('checkout', compact('cart'));
}

public function store(Request $request)
{
    $request->validate([
        'nom'=>'required',
        'email'=>'required|email',
        'adresse'=>'required'
    ]);

    $cart = session()->get('cart', []);

    $total = 0;

    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    session()->forget('cart');

    return redirect()->route('merci')->with('total',$total);
}

public function merci()
{
    return view('merci');
}

}