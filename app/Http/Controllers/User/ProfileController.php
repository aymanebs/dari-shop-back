<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function edit(){
        return view('profile.edit');
    }

    public function wishlist(){
        return view('profile.wishlist');
    }
}
