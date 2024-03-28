<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest as AuthRegisterRequest;
use App\Models\Customer;
use App\Models\Seller;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function registration(){
        return view('auth.registration');
    }


    public function register(AuthRegisterRequest $request ){
       
        /*
       Database Insert
       */
      try {
        DB::beginTransaction();

        $user = User::create([ 
            'email' => $request ->email,
            'password' => Hash::make($request->password),
        ]);

        if($request->role == '1'){

           $user->roles()->attach(3);

           Customer::create([
               'user_id' => $user->id,
               'name' => $request ->name,
               'phone' => $request->phone,
               'adress' => $request->adress,
           ]);

        }

        else if($request->role == '2'){

            $user->roles()->attach(4);

            $seller=Seller::create([
                'user_id' => $user->id,
                'name' => $request ->name,
                'phone' => $request->phone,
                'adress' => $request->adress,
            ]);
            $seller->addMediaFromRequest('justify')->toMediaCollection('justifications');
 
         }

        DB::commit();
      
        return back();
    }

    catch (\Exception $e) {

        DB::rollBack();

       
        return back()->withInput()->with('error', 'Une erreur s\'est produite lors de la création de votre compte. Veuillez réessayer plus tard.');
    }
    }

    // login user

    public function loginUser(LoginRequest $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            // return back()->withErrors([
            //     'email' => 'Invalid email or password',
            // ]);
            echo('Invalid email or password');
        }

    }

    // logout method

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
           
            // return back()->withErrors([
            //     'error' => 'There might be an issue with logout',
            // ]);
            echo'There might be an issue with logout';
        }
    }


        
}
