<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller {
    public function index() {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }
}