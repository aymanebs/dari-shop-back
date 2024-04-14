<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\AdressRequest;
use App\Http\Requests\Checkout\DeliveryRequest;
use App\Http\Requests\Checkout\PaymentRequest;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function create()
    {
        $customer = auth()->user()->customer;
        // Retrieve cart for the current user
        $cart = Cart::where('customer_id', $customer->id)->first();
    
        // Checking if the order already exists
        $existingOrder = $customer->orders()->where('status', 1)->first();
        if ($existingOrder) {
            // If an existing order is found, update it with any additional products from the cart
            $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
            foreach ($cartProducts as $cartProduct) {
                // Check if the product is already in the order, if not, add it
                if (!$existingOrder->products->contains($cartProduct->product_id)) {
                    $existingOrder->products()->attach($cartProduct->product_id, [
                        'quantity' => $cartProduct->quantity,
                        'price' => $cartProduct->product->price, // Include the price
                        
                    ]);
                }
            }
            return view('checkout.adress', ['orderId' => $existingOrder->id, 'order' => $existingOrder]);
        }
    
        // If no existing order, create a new one
        $order = new Order();
        $order->customer_id = $cart->customer_id;
        $order->save();
    
        // Assign all cart products to the order
        foreach ($cart->products as $cartProduct) {
            $order->products()->attach($cartProduct->id, [
                'quantity' => $cartProduct->quantity,
                'price' => $cartProduct->product->price, // Include the price
                dd($cartProduct->product->price),
                
            ]);
        }
    
        return view('checkout.adress', ['orderId' => $order->id]);
    }
    



    public function saveAdress(AdressRequest $request)
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

    public function saveDelivery(DeliveryRequest $request)
    {
        // dd($request->all());
        $orderId = $request->orderId;
        $order = Order::findOrFail($orderId);
        $order->delivery_method = $request->delivery_method;
        $order->save();
        return redirect()->route('checkout.review', ['orderId' => $orderId]);
    }

    public function review($orderId)
    {
        $order = Order::findOrFail($orderId);

        $orderProducts = OrderProduct::where('order_id', $orderId)->get();
        $totals = [];
        foreach ($orderProducts as $orderProduct) {
            $price = $orderProduct->price;
            $quantity = $orderProduct->quantity;
            $totals[$orderProduct->product_id] = $price * $quantity;
        }
        $subtotal = array_sum($totals);
        return view('checkout.review', compact('order', 'totals', 'subtotal'));
    }

    public function paymentView($orderId)
    {
        $orderProducts = OrderProduct::where('order_id', $orderId)->get();
        $totals = [];
        foreach ($orderProducts as $orderProduct) {
            $price = $orderProduct->price;
            $quantity = $orderProduct->quantity;
            $totals[$orderProduct->product_id] = $price * $quantity;
        }
        $subtotal = array_sum($totals);
        return view('checkout.payment',compact('subtotal','orderId'));
    }

    public function payment(PaymentRequest $request)
    {    
        $orderId = $request->orderId;
        $orderProducts = OrderProduct::where('order_id', $orderId)->get();
        $totals = [];
        foreach ($orderProducts as $orderProduct) {
            $price = $orderProduct->price;
            $quantity = $orderProduct->quantity;
            $totals[$orderProduct->product_id] = $price * $quantity * 100;
        }
        $subtotal = array_sum($totals);
        
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $subtotal,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'payment_method' => 'pm_card_visa',
                

            ]);
            $paymentIntent->confirm();
            // Retrieve the products in the user's cart
            $cartProducts = auth()->user()->customer->cart->products;

            // Decrement product stocks and detach them from the cart
            foreach ($cartProducts as $product) {
                $quantity = $product->pivot->quantity;
                $product->decrement('stock', $quantity);
            }

            // Delete the user's cart
            auth()->user()->customer->cart->products()->detach();
            auth()->user()->customer->cart->delete();

            // Update the status of orders associated with the current customer from 'pending' (status = 1) to 'completed' (status = 2)
            Order::where('customer_id', auth()->user()->customer->id)
                ->where('status', 1)
                ->update(['status' => 2]);

            return redirect()->route('checkout.confirmation');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function confirmIndex()
    {
        return view('checkout.confirmation');
    }
}
