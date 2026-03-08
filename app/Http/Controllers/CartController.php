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

    public function add($id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->nom,
                "quantity" => 1,
                "price" => $product->prix,
                "image" => $product->image // Kay-sajel smiyt l-fichier ghir bohdha
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Fleur ajoutée avec succès! 🌸');
    }

    public function update(Request $request) {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour!');
        }
    }

    public function remove(Request $request) {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Produit supprimé!');
        }
    }
}