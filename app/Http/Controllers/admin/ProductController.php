<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 1. Show all products in a table
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle Image Upload
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(storage_path('app/public/products'), $imageName);

        // Save to Database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName, // We save only the name
        ]);

        return redirect()->route('products.index')->with('success', 'Fleur zayda mzyan!');
    }
}