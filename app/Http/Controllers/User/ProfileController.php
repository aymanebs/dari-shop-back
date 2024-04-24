<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    

    public function edit(){

        return view('profile.edit');
    }

    
    public function update(Request $request, Customer $customer){

        $customer->user->update(
            $request->only( 'email')
        );
        $customer->update([
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'adress' => $request->input('adress')
        ]);
        if($request->hasFile('avatar')){
            $customer->user->clearMediaCollection('avatars');
            $customer->user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        
        return redirect()->route('profile.edit')->with('success','Profile updated successfully');

    }
    

    public function editAdress(){
        return view('profile.edit-adress');
    }

    public function editPassword(){
        return view('profile.edit-password');
    }

    public function updatePassword(Request $request){

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
    
        $user = auth()->user();
       
    
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->with('error', 'Old password is incorrect');
        }
    
        $newPassword = $request->input('password');
        $user->password = bcrypt($newPassword);
        $user->update([
            'password' => bcrypt($newPassword)
        
        ]);
    
        return redirect()->route('profile.edit-password')->with('success', 'Password updated successfully');
    }

    public function updateAdress(Request $request){
        $customer = auth()->user()->customer;
        $customer->update([
            'adress' => $request->input('adress'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),

        ]);
        return redirect()->route('profile.edit-adress')->with('success','Adress updated successfully');
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
