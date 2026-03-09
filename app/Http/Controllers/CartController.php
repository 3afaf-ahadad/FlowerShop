<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Affichigi l-page dyal l-panier
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
                "slug" => $product->slug // ✨ Khlina hada bach l-liens west l-panier ikhdmou
            ];
        }
        
        session()->put('cart', $cart);

        // ✨ Redirect back m3a l-flash message l-jdid
        return redirect()->back()->with('success', 'Le bouquet "' . $product->nom . '" a été ajouté au panier ! 🌸');
    }

    // Mise à jour dyal l-quantité (Increase/Decrease)
    public function update(Request $request)
    {
        if($request->id && $request->action) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
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
        return redirect()->back();
    }

    // M7i produit wa7ed mn l-panier
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart', []);
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with('success', 'Produit retiré!');
    }

    // Khwi l-panier kamel
    public function clear() {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé!');
    }
}