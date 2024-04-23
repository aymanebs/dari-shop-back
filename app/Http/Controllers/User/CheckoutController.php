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
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('checkout.index');
    }

    public function createOrder(Request $request)
    {

        $cart = Cart::where('customer_id', auth()->user()->customer->id)->first();



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
                'total' => $cartProduct->price * $cartProduct->pivot->quantity,
            ]);
        }

        return response()->json([
            "message" => "Order created successfully",
            "orderId" => $order->id,
        ]);
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

        try {


            // Create the Stripe session with the correct success URL
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
                'success_url' => route('checkout.confirmation') . '?orderId=' . $request->orderId . '&session_id={CHECKOUT_SESSION_ID}',


                'cancel_url' => route('checkout.failure'),
            ]);



            // Return JSON response with session URL
            return response()->json([
                "message" => "Order created successfully",
                "url" => $session->url,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 500);
        }
    }


    public function confirmation(Request $request)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionId = $request->session_id;
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

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

            // Fill payment table
            $payment = Payment::create([
                'amount' => $session->amount_total / 100,

                'payment_method' => $session->payment_method_types[0],
                'status' => $session->payment_status == 'paid' ? 2 : 1,
                'order_id' => $request->orderId
            ]);
            $payment->save();


            return view('checkout.confirmation');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function failure()
    {
        return redirect()->route('home')->with('error', 'Payment failed');
    }
}
