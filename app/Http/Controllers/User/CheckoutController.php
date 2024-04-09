<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
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
    public function reviewIndex()
    {
        return view('checkout.review');
    }
    public function confirmIndex()
    {
        return view('checkout.confirmation');
    }
}
