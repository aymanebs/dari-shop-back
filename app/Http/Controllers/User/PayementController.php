<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;

class PayementController extends Controller
{
    public function payment(Request $request)
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
            return redirect()->route('checkout.confirmation');
       }
         catch(\Exception $e){
              return $e->getMessage();
         }
        }
}
