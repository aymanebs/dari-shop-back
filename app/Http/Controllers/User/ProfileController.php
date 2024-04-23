<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        
        return view('profile.index');
    }

    public function edit(){

        return view('profile.edit');
    }

    // public function wishlist(){
    //     return view('profile.wishlist');
    // }

    public function editAdress(){
        return view('profile.edit-adress');
    }

    public function editPassword(){
        return view('profile.edit-password');
    }

    public function update(Request $request, Customer $customer){

        $customer->user->update(
            $request->only('name', 'email')
        );
        $customer->update($request->input('phone'));
        return redirect()->route('profile');

    }

    public function listOrders(){
        $customer = auth()->user()->customer;
        $orders = $customer->orders()->with('products')->orderbyDesc('created_at')->get();
        
        foreach ($orders as $order){
           
            $total=0;
            foreach ($order->products as $product){
                $total += $product->price * $product->pivot->quantity;
            }
            $order->total = $total;
        }
        return view('profile.orders',compact('orders'));
    }
}
