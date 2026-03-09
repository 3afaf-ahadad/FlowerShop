<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Page du panier
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Ajouter produit au panier
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->nom,
                "quantity" => 1,
                "price" => $product->prix,
                "image" => $product->image,
                "slug" => $product->slug
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Le bouquet "' . $product->nom . '" a été ajouté au panier ! 🌸');
    }

    // Supprimer produit
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            return redirect()->back();
        }
    }

    // Update quantité
    public function update(Request $request)
    {
        if($request->id && $request->action) {
            $cart = session()->get('cart');

            if($request->action == 'increase') {
                $cart[$request->id]['quantity']++;
            } 
            elseif($request->action == 'decrease' && $cart[$request->id]['quantity'] > 1) {
                $cart[$request->id]['quantity']--;
            }

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Quantité mise à jour!');
        }
    }
}