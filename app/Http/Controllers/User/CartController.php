<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $customer = auth()->user()->customer;
        $cart = $customer->cart;

        if ($cart) {
            $cartProducts = $cart->products()->withPivot('quantity')->get();
            $totals = [];

            foreach ($cartProducts as $cartProduct) {
                $price = $cartProduct->price;
                $quantity = $cartProduct->pivot->quantity;
                $total = $price * $quantity;
                $totals[$cartProduct->pivot->product_id] = $total;
            }

            return view('customer.cart', compact('cart', 'totals'));
        } else {

            return redirect()->route('home')->with('error', 'No products in cart');
        }
    }

    public function getCartData(){
        $customer = auth()->user()->customer;
        $cart = $customer->cart;
        $cartProducts = $cart->products()->withPivot('quantity')->get();
        foreach ($cartProducts as $product) {
            $product->image = $product->getFirstMediaUrl('products'); 
        }
        return response()->json($cartProducts);
    }


    public function store(Product $product)
    {

        $customer = auth()->user()->customer;

        $cart = $customer->cart;

        if (!$cart) {
            $cart = $customer->cart()->create([
                'price_total' => 0
            ]);
        }

        if ($cart->products->contains($product->id)) {

            return redirect()->back()->with('error', 'Product already in cart');
        }

        $cart->products()->attach($product->id);
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }


    public function updateCart(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        
        $cart = auth()->user()->customer->cart;
       
        $product = Product::findOrFail($productId);


        
        if ($quantity > $product->stock) {
            return response()->json(['error' => 'Requested quantity exceeds available stock']);
        }

  
        $cartProduct = CartProduct::where('cart_id', $cart->id)
                                     ->where('product_id', $productId)
                                    ->first();



        if ($cartProduct) {
            $cartProduct->quantity = $quantity;
            $cartProduct->save();
        }
      
  
        return response()->json(['message' => 'Quantity updated successfully', 'quantity' => $request->quantity]);
    }


    public function removeFromCart(Product $product)
    {
        $cart = auth()->user()->customer->cart;
        $cart->products()->detach($product->id);
        $order = auth()->user()->customer->orders()->where('status', 1)->first();
        // Check if the cart is empty after removing the product
        if ($cart->products->isEmpty()) {
            $cart->delete(); // Delete the cart
        }
        if ($order) {
            $order->products()->detach($product->id);
        }
        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully');
    }
}
