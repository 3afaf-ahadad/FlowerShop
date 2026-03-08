<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Hadi khassha t-koun dyal l-page d l-panier bo7dha!
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart')); // Safi, hna kat-ban l-page d l-panier
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
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        
        // Ila bghiti l-user i-bqa f l-accueil o i-chouf l-msg:
        return redirect()->back()->with('success', 'Fleur ajoutée au panier! 🌸');
    }

    public function remove(Request $request) {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back();
        }
    }

    public function update(Request $request)
{
    // T-akdi bli l-id o l-action waslin
    if($request->id && $request->action) {
        $cart = session()->get('cart');
        
        if($request->action == 'increase') {
            $cart[$request->id]['quantity']++;
        } 
        else if($request->action == 'decrease' && $cart[$request->id]['quantity'] > 1) {
            $cart[$request->id]['quantity']--;
        }

        session()->put('cart', $cart);
        // Had l-back darouriya bach t-rechargi l-page o tchoufi l-farq
        return redirect()->back()->with('success', 'Quantité mise à jour!');
    }
}
}