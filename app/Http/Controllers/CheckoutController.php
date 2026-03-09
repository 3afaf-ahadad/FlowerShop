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
'nom' => 'required',
'email' => 'required|email',
'telephone' => 'required',
'adresse' => 'required'
]);

$cart = session()->get('cart', []);

$total = 0;

foreach($cart as $item){
$total += $item['price'] * $item['quantity'];
}

$reference = 'CMD'.rand(1000,9999);

session()->put('order_reference', $reference);
session()->put('order_cart', $cart);
session()->put('order_total', $total);

session()->forget('cart');

return redirect()->route('confirmation');

}
public function merci()
{
    return view('merci');
}

}