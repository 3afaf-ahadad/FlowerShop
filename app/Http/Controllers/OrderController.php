<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email', // Ensure you added this column to your clients migration!
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'ville' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        try {
            DB::beginTransaction();

            // 2. Create or Find Client
            $client = Client::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'ville' => $request->ville,
            ]);

            // 3. Calculate Total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // 4. Create Order
            $order = Order::create([
                'client_id' => $client->id,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            // 5. Create Order Items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'], // Fixed: was flower_id in your previous version
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            DB::commit();

            // 6. Clear Cart and Redirect
            Session::forget('cart');

            return redirect()->route('welcome')->with('success', 'Votre commande a été enregistrée avec succès !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la commande : ' . $e->getMessage());
        }
    }



    // public function store(Request $request)
    // {
    //     $client = Client::create([
    //         'nom' => $request->nom,
    //         'prenom' => $request->prenom,
    //         'adresse' => $request->adresse,
    //         'telephone' => $request->telephone,
    //     ]);

    //     $order = Order::create([
    //         'client_id' => $client->id
    //     ]);

    //     foreach(session('cart') as $item){
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'flower_id' => $item['id'],
    //             'quantity' => $item['quantity']
    //         ]);
    //     }

    //     // Envoi email
    //     Mail::to($client->email)->send(new OrderConfirmed($order));

    //     // Vider panier
    //     session()->forget('cart');

    //     return view('merci');
    // }
}
