<?php


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
    // ================= Checkout / Store (déjà existed) ==================
    
    public function index()
    {
        // ✅ Checkout page – fetch cart
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
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

            // 1️⃣ Create Client
            $client = Client::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'ville' => $request->ville,
            ]);

            // 2️⃣ Calculate Total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // 3️⃣ Create Order
            $order = Order::create([
                'client_id' => $client->id,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            // 4️⃣ Create Order Items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            DB::commit();

            // 5️⃣ Send confirmation email
            Mail::to($client->email)->send(new OrderConfirmed($order));

            // 6️⃣ Clear Cart
            Session::forget('cart');

            // 7️⃣ Redirect to Thank You page
            return redirect()->route('order.success');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    // ================= Phase 4: Admin Order List ==================

    public function adminIndex()
    {
        // ✅ Fetch all orders for admin
        $orders = Order::with('client')->get(); // load client info for display

        return view('admin.orders.index', compact('orders'));
    }

    // ================= Phase 4: Order Status Update ==================

    public function ship($id)
    {
        // ✅ Find order by ID
        $order = Order::findOrFail($id);

        // ✅ Update status to shipped
        $order->update(['status' => 'shipped']);

        return redirect()->back()->with('success', 'Order marked as shipped!');
    }
}





/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed; // Had l-class li 3ndek f image_582f39
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        return view('checkout', compact('cart')); // Khass t-koun 3ndek view smitha checkout.blade.php
    }
    public function store(Request $request)
<<<<<<< HEAD
    {
        // 1. Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'ville' => 'required|string',
        ]);
=======
{
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'adresse' => 'required',
        'ville' => 'required',
    ]);
>>>>>>> 436bc6ae158341906975e47ca401e52e9e2562eb

    $cart = session()->get('cart', []);

<<<<<<< HEAD
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        try {
            DB::beginTransaction();

            // 2. Create Client
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
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            DB::commit();

            // ✨ 6. ENVOI DE L'EMAIL
            // Kansiftou l-mail l-email dyal l-client li dkhl f l-form
            Mail::to($client->email)->send(new OrderConfirmed($order));

            // 7. Clear Cart
            Session::forget('cart');

            // 8. Redirect l-page "Merci"
            return redirect()->route('order.success');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }
=======
    if(empty($cart)){
        return back()->with('error','Panier vide');
    }

    $client = Client::create([
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'email'=>$request->email,
        'telephone'=>$request->telephone,
        'adresse'=>$request->adresse,
        'ville'=>$request->ville
    ]);

    $total = 0;
    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    $order = Order::create([
        'client_id'=>$client->id,
        'total_price'=>$total,
        'status'=>'pending'
    ]);

    foreach($cart as $item){
        OrderItem::create([
            'order_id'=>$order->id,
            'product_id'=>$item['id'],
            'quantity'=>$item['quantity'],
            'price'=>$item['price']
        ]);
    }

    session()->forget('cart');

    return redirect('merci');
}

>>>>>>> 436bc6ae158341906975e47ca401e52e9e2562eb
}
*/