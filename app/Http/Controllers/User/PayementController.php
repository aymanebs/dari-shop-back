<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\PaymentRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;

class PayementController extends Controller
{
    public function payment(PaymentRequest $request)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => 1099,
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

            // Update the status of orders associated with the current customer from 'pending' (status = 1) to 'paid' (status = 2)
            Order::where('customer_id', auth()->user()->customer->id)
                ->where('status', 1)
                ->update(['status' => 2]);

            return redirect()->route('checkout.confirmation');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
