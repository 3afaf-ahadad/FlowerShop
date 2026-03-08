<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $fleurs = Product::all();
        return view('welcome', compact('fleurs'));
    }


    public function show($slug) {
       $fleurs = Product::all();
        return view('welcome', compact('fleurs'));
    }


public function create() {
    return view('admin.create'); // Kat-hall l-wajha li siyabna
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    \App\Models\Product::create([
        'name' => $request->name,
        'image' => $imagePath, // Hna kan-seviw l-moussar (path)
    ]);

    return redirect()->route('admin.products.create')->with('success', 'Fleur ajoutée!');
}
}