<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{   

    public function index(){
        $cart = auth()->user()->customer->cart;
        return view('customer.cart',compact('cart'));
    }

    public function store(Product $product){

        $customer = auth()->user()->customer;
        $cart = $customer->cart;

        if(!$cart){
            $cart = $customer->cart()->create([
                'price_total' => 0
            ]);

        }
        if( $cart->products->contains($product->id)){

             return redirect()->route('home')->with('error','Product already in cart');

        }
        
        $cart->products()->attach($product->id);
        return redirect()->route('home')->with('success','Product added to cart successfully');

    }

    public function removeFromCart(Product $product){

        $cart = auth()->user()->customer->cart;
        $cart->products()->detach($product->id);
        return redirect()->route('cart.index')->with('success','Product removed from cart successfully');

     }
}
