<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin/products/index',compact('products'));
    }

    public function accept(Product $product){

        if($product->status == 1){
            $product->update(['status'=>2]);
        }
        return redirect()->back();

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->back();
    }
}
