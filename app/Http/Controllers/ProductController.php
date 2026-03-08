<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Affiche la page d'accueil avec toutes les fleurs
     */
    public function index()
    {
        // Kan-jibou l-fleurs kamlin (Smiya match m3a view)
        $fleurs = Product::all(); 
        return view('welcome', compact('fleurs'));
    }

    /**
     * Affiche les détails d'une fleur spécifique (par slug)
     */
    public function show($slug) 
    {
        $fleur = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('fleur'));
    }

    /**
     * Formulaire pour ajouter une nouvelle fleur (Admin)
     */
    public function create() 
    {
        return view('admin.create'); 
    }

    /**
     * Enregistrer la fleur dans la base de données
     */
    public function store(Request $request) 
    {
        // 1. Validation (Matching migration columns)
        $request->validate([
            'nom'   => 'required|string|max:255',
            'prix'  => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'categorie_id' => 'required|exists:categories,id', // Darouri hit dertih constrained
        ]);

        // 2. Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Création du produit (Matching migration)
        Product::create([
            'nom'          => $request->nom,
            'prix'         => $request->prix,
            'image'        => $imagePath,
            'slug'         => Str::slug($request->nom), // Generate slug from name
            'description'  => $request->description,
            'stock'        => $request->stock ?? 0,
            'categorie_id' => $request->categorie_id,
            'is_active'    => true,
        ]);

        return redirect()->route('admin.products.create')->with('success', 'Fleur ajoutée avec succès!');
    }
}