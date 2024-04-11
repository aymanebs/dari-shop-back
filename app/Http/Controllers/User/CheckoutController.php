<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function create(){

        // Retrieve cart for the current user
        $cart = Cart::where('customer_id', auth()->user()->customer->id)->first();
        // Create a new order instance
        $order = new Order();
        // Define the customer in the order
        $order->customer_id = $cart->customer_id;
        $order->save();
         // Retrieve cart items associated with the cart
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        // Assign the cart to the order
        foreach ($cartProducts as $cartProduct) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $cartProduct->product_id;
            $orderProduct->price = $cartProduct->product->price;
            // $orderProduct->quantity = $cartProduct->quantity;
            $orderProduct->save();

        }
        // dd($order->id);
        return view('checkout.adress', ['orderId' => $order->id]);



    }


    public function saveAdress(Request $request)
    {   
        // dd($request->all());
        $orderId = $request->orderId;
        $order = Order::findOrFail($orderId);
        $order->shipping_adress = $request->shipping_adress;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_region = $request->shipping_region;
        $order->additional_info = $request->additional_info;

       
        $order->save();

        return view('checkout.delivery', ['orderId' => $order->id]);
    }

    public function saveDelivery(Request $request){
        // dd($request->all());
        $orderId = $request->orderId;
        $order = Order::findOrFail($orderId);
        $order->delivery_method = $request->delivery_method;
        $order->save();
        return redirect()->route('checkout.review', ['orderId' => $orderId]);

    }

    public function review($orderId)
    {
        $order=Order::findOrFail($orderId);
        return view('checkout.review',compact('order'));
    }


    public function adressIndex()
    {
        return view('checkout.adress');
    }

    public function deliveryIndex()
    {
        return view('checkout.delivery');
    }
    public function paymentIndex()
    {
        return view('checkout.payment');
    }
   
    public function confirmIndex()
    {
        return view('checkout.confirmation');
    }
}
