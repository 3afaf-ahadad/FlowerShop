<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // T-akdi smiyt l-Model dyalk Product awla Fleur

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Hna l-fix: kan-siftu 'name' o 'price' bla ktaba zayda
            $cart[$id] = [
                "name" => $product->nom,
                "quantity" => 1,
                "price" => (float) $product->prix, 
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Fleur ajoutée avec succès! 🌸');
    }

    public function remove(Request $request)
    {
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