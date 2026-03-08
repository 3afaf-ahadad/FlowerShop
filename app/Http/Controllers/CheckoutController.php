<?php

namespace App\Http\Controllers;

abstract class CheckoutController
{
 public function store(Request $request) {
    // 1. Validation: n-ta'kdou bli kolchi m-kteb
    $request->validate([
        'full_name' => 'required',
        'address' => 'required',
        'phone' => 'required|numeric',
    ]);

    // 2. Enregistrement: n-sejjlo f la base de données
    Order::create([
        'full_name' => $request->full_name,
        'address' => $request->address,
        'city' => $request->city,
        'phone' => $request->phone,
        'total_amount' => 500.00, // Hna men b3d Nouhaila ghat-3tik l-prix dial l-panier
    ]);

    return back()->with('success', 'Commande confirmée avec succès! 🌸');
}   
}
