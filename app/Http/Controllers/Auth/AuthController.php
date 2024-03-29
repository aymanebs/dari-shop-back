<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest as AuthRegisterRequest;
use App\Models\User;
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
            'name' => $request ->name,
            'email' => $request ->email,
            'password' => Hash::make($request->password),
        ]);

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
