<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => (float) $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Fleur ajoutée! 🌸');
    }

    public function update(Request $request) {
        $cart = session()->get('cart', []);
        if($request->id && $request->quantity && isset($cart[$request->id])) {
            $cart[$request->id]["quantity"] = (int) $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function remove(Request $request) {
        if($request->id) {
            $cart = session()->get('cart', []);
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function clear() {
        session()->forget('cart');
        return redirect()->route('cart.index');
    }
}