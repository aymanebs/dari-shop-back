<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
        $totalConstumers = Customer::count();
        $totalSellers = Seller::count();
        $totalProducts = Product::count();
        $pendingProducts = Product::where('status',1)->count();
        $bannedUsers = User::where('status',2)->count();
      return view('admin.dashboard',compact('totalProducts','totalSellers','totalConstumers','totalProducts'));
   }
}
