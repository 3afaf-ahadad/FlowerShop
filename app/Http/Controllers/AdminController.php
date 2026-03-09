<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

public function index() {
    return view('admin.dashboard', [
        'totalProducts' => \App\Models\Product::count(),
        'totalOrders' => \App\Models\Order::count(),
        'lowStockCount' => \App\Models\Product::where('stock', '<', 5)->count(),
    ]);
}}