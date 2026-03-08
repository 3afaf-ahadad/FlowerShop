<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        // Gadina smiya l $products bach t-fhamha l-view
        $products = Product::all(); 
        return view('welcome', compact('products'));
    }

    public function show($slug) 
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nom'   => 'required|string|max:255',
            'prix'  => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Kay-t-stora f: storage/app/public/products
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'nom'          => $request->nom,
            'prix'         => $request->prix,
            'image'        => $imagePath, // Ghadi t-tsajel fiha "products/smiya.jpg"
            'slug'         => Str::slug($request->nom),
            'description'  => $request->description,
            'stock'        => $request->stock ?? 0,
            'categorie_id' => $request->categorie_id,
            'is_active'    => true,
        ]);

        return redirect()->back()->with('success', 'Fleur ajoutée avec succès!');
    }
}