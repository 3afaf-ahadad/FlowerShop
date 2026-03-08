<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    // Displaying the cart page
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Adding a flower to the session
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->nom,
                "quantity" => 1,
                "price" => (float) $product->prix,
                "image" => "products/" . $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', '🌸 Fleur ajoutée!');
    }

    // Updating quantity (Nouhaiila)
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', '✨ Panier mis à jour!');
        }
    }

    // Removing an item from the cart
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', '🗑️ Fleur supprimée!');
        }
    }
}
