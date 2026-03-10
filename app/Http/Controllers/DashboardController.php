<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    
    public function index()
    {
        
        $totalProducts = Product::count();
        
        $totalOrders = Order::count();
        
        $lowStockCount = Product::where('stock', '<', 5)->count();
        
        $lowStockProducts = Product::where('stock', '<', 5)->get();

        
        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'lowStockCount',
            'lowStockProducts'
        ));
    }
}