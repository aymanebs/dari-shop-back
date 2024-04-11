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
        $cart = auth()->user()->customer->cart;
        return view('customer.cart', compact('cart'));
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

            return redirect()->route('home')->with('error', 'Product already in cart');
        }

        $cart->products()->attach($product->id);
        return redirect()->route('home')->with('success', 'Product added to cart successfully');
    }

    public function update(Request $request , Product $product)
    {
        $product = Product::findOrFail($product);

        $cart = auth()->user()->customer->cart;
        $action = $request->action;
       

        // if($action == "increment"){
        //     $cart->products->updateExistingPivot($request->productId,['quantity'=>$product->pivot->quantity + 1]);
        // }
        // else if($action == "decrement" && $product->pivot->quantity > 0 ){
        //     $cart->products()->updateExistingPivot($request->productId,['quantity'=>$product->pivot->quantity - 1]);
        // }

        return response()->json([
            'message' => 'Cart updated successfully',
            'action' => $action,
            'product' => $product,
            'request' => $request,
        ]);
    }

    public function updateCart(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;

        // Update the quantity in the database
        $cartProduct = CartProduct::where('product_id', $productId)->first();

        if ($cartProduct) {
            $cartProduct->quantity = $quantity;
            $cartProduct->save();
        }

        // You can return a response if needed
        return response()->json(['message' => 'Quantity updated successfully']);
    }

    public function removeFromCart(Product $product)
    {
        $cart = auth()->user()->customer->cart;
        $cart->products()->detach($product->id);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully');
    }
}
