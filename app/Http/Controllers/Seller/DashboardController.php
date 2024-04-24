<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $seller = auth()->user()->seller;
        $productsByCategory = [
            'food' => $seller->products()->where('category_id', 1)->count(),
            'craft' => $seller->products()->where('category_id', 2)->count(),
            'beauty' => $seller->products()->where('category_id', 3)->count(),
            'textile' => $seller->products()->where('category_id', 4)->count(),
            'decoration' => $seller->products()->where('category_id', 5)->count(),
            'jewelry' => $seller->products()->where('category_id', 6)->count(),
            

        ];
        $inStock = $seller->products()->where('stock', '>', 0)->count();
        $outOfStock = $seller->products()->where('stock', 0)->count();
        $totalProducts = $seller->products()->count();
        $pendingProducts = $seller->products()->where('status', 1)->count();
        $approvedProducts = $seller->products()->where('status', 2)->count();

        return view('seller.dashboard',compact('productsByCategory','totalProducts','inStock','outOfStock','pendingProducts','approvedProducts'));
    }
}
