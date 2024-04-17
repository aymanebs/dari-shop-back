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


    // public function create()
    // {
    //     $customer = auth()->user()->customer;
    //     // Retrieve cart for the current user
    //     $cart = Cart::where('customer_id', $customer->id)->first();

    //     $cartProducts = CartProduct::where('cart_id', $cart->id)->get();

    //     $cartData = [];

    //     foreach ($cartProducts as $cartProduct) {
    //         $productData = [
    //             'name' => $cartProduct->product->name,
    //             'price' => $cartProduct->product->price,
    //             'quantity' => $cartProduct->quantity
    //         ];

    //         $cartData[] = $productData;

    //     // Checking if the order already exists
    //     // $existingOrder = $customer->orders()->where('status', 1)->first();
    //     // if ($existingOrder) {
    //         // If an existing order is found, update it with any additional products from the cart
    //         // $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
    //         // foreach ($cartProducts as $cartProduct) {
    //             // Check if the product is already in the order, if not, add it
    //         //     if (!$existingOrder->products->contains($cartProduct->product_id)) {
    //         //         $existingOrder->products()->attach($cartProduct->product_id, [
    //         //             'quantity' => $cartProduct->quantity,
    //         //             'price' => $cartProduct->product->price, // Include the price

    //         //         ]);
    //         //     }
    //         // }
    //         return view('checkout.adress')->with('cartData', $cartData);
    //     }

    //     // If no existing order, create a new one
    //     // $order = new Order();
    //     // $order->customer_id = $cart->customer_id;
    //     // $order->save();

    //     // // Assign all cart products to the order
    //     // foreach ($cart->products as $cartProduct) {
    //     //     $order->products()->attach($cartProduct->id, [
    //     //         'quantity' => $cartProduct->quantity,
    //     //         'price' => $cartProduct->product->price, // Include the price
    //     //         dd($cartProduct->product->price),

    //     //     ]);
    //     // }

    //     // return view('checkout.adress', ['orderId' => $order->id]);
    // }

    public function create()
    {
        return view('checkout.adress');
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
        return view('checkout.payment', compact('subtotal', 'orderId'));
    }


    public function payment(Request $request)
    {
        header("Access-Control-Allow-Origin: *");

        $orderProducts = OrderProduct::where('order_id', $request->orderId)->get();
        $totals = [];
        foreach ($orderProducts as $orderProduct) {
            $price = $orderProduct->price;
            $quantity = $orderProduct->quantity;
            $totals[$orderProduct->product_id] = $price * $quantity * 100;
        }
        $subTotal = array_sum($totals);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([

            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'product',
                    ],
                    'unit_amount' => $subTotal,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.confirmation', ['orderId' => $request->orderId]),
            'cancel_url' => route('checkout.failure'),
        ]);


        return response()->json([
            "message" => "Order created successfully",
            "url" => $session->url,
        ]);
    }

    public function confirmation(Request $request)
    {

        try {
            $orderProducts = OrderProduct::where('order_id', $request->orderId)->get();
            // Decrement products stock

            foreach ($orderProducts as $orderProduct) {
                $quantity = $orderProduct->quantity;
                $orderProduct->product->decrement('stock', $quantity);
            }
            // delete the cart
            auth()->user()->customer->cart->products()->detach();
            auth()->user()->customer->cart->delete();

            // update the status of the order
            Order::where('id', $request->orderId)->update(['status' => 2]);

            return view('checkout.confirmation');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function failure()
    {
        return "Payment failed";
    }


    // public function payment(Request $request)
    // {    
    // dd($request->all());
    // $orderId = $request->orderId;

    // $orderProducts = OrderProduct::where('order_id', $orderId)->get();
    // $totals = [];
    // foreach ($orderProducts as $orderProduct) {
    //     $price = $orderProduct->price;
    //     $quantity = $orderProduct->quantity;
    //     $totals[$orderProduct->product_id] = $price * $quantity * 100;
    // }
    // $subtotal = array_sum($totals);


    // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // try {
    //     $paymentIntent = \Stripe\PaymentIntent::create([
    //         'amount' => $subtotal,
    //         'currency' => 'usd',
    //         'payment_method_types' => ['card'],
    //         'payment_method' => 'pm_card_visa',


    // ]);
    // $paymentIntent->confirm();
    // Retrieve the products in the user's cart
    // $cartProducts = auth()->user()->customer->cart->products;

    // Decrement product stocks and detach them from the cart
    // foreach ($cartProducts as $product) {
    //     $quantity = $product->pivot->quantity;
    //     $product->decrement('stock', $quantity);
    // }

    // Delete the user's cart
    // auth()->user()->customer->cart->products()->detach();
    // auth()->user()->customer->cart->delete();

    // Update the status of orders associated with the current customer from 'pending' (status = 1) to 'completed' (status = 2)
    // Order::where('customer_id', auth()->user()->customer->id)
    //     ->where('status', 1)
    //     ->update(['status' => 2]);

    //     return redirect()->route('checkout.confirmation');
    // } catch (\Exception $e) {
    //     return $e->getMessage();
    // }
    // }

    public function confirmIndex()
    {
        return view('checkout.confirmation');
    }


    public function createOrder(Request $request)
    {

        $cart = Cart::where('customer_id', auth()->user()->customer->id)->first();

        // $cartProducts = CartProduct::where('cart_id', $cart->id)->get();

        $formData = json_decode($request->getContent(), true);
        $shippingAdress = $formData['shipping_adress'];
        $shipping_region = $formData['shipping_region'];
        $shipping_city = $formData['shipping_city'];
        $additional_info = $formData['additional_info'];
        $delivery_method = $formData['delivery_method'];



        $order = Order::create([
            'shipping_adress' => $shippingAdress,
            'shipping_region' => $shipping_region,
            'shipping_city' => $shipping_city,
            'additional_info' => $additional_info,
            'delivery_method' => $delivery_method,
            'customer_id' => auth()->user()->customer->id,

        ]);


        foreach ($cart->products as $cartProduct) {
            $order->products()->attach($cartProduct->id, [
                'quantity' => $cartProduct->pivot->quantity,
                'price' => $cartProduct->price,



            ]);
        }

        return response()->json([
            "message" => "Order created successfully",
            "orderId" => $order->id,
        ]);
    }
}
