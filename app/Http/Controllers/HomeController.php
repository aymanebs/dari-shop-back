<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {

      $categories = Category::all();
      $categoryImages = [
         'alimentation_img.jpeg',
         'cat_artisanat.jpg',
         'category_beauty.jpg',
         'textiles_img.jpg',
         'decor_img.jpg',
         'jewelry_img.jpeg'
      ];
      $products = Product::all();
      $latestProducts = Product::latest()->limit(6)->get();
   
      $bestSellingProducts  = Product::whereHas('orders', function ($query) {
         $query->where('status', 2);
      })->take(4)->get();;

      return view('home', compact('products', 'latestProducts', 'categories', 'categoryImages', 'bestSellingProducts'));
   }

   public function about()
   {
      return view('about');
   }

   public function contact()
   {
      return view('contact');
   }
}
