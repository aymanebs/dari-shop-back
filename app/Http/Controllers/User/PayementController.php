<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\PaymentRequest;
use Illuminate\Http\Request;
use Stripe\Stripe;

class PayementController extends Controller
{
    public function payment(PaymentRequest $request)
    {
        
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
       try{
        $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => 1099,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'payment_method' => 'pm_card_visa',
                
                
            ]); 

                
            $paymentIntent->confirm();
            auth()->user()->customer->cart->products()->detach();
            auth()->user()->customer->cart->delete();
            return redirect()->route('checkout.confirmation');
       }
         catch(\Exception $e){
              return $e->getMessage();
         }
        }
}
