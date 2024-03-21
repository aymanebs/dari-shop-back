<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[AuthAuthController::class,'login']);
Route::get('/registration',[AuthAuthController::class,'registration']);
Route::post('/register',[AuthAuthController::class,'register'])->name('register');
Route::post('/login',[AuthAuthController::class,'loginUser'])->name('login');

Route::middleware('authCheck')->group(function () {
    Route::get('/home',[Controller::class,'index'])->name('home');  
    Route::get('/logout',[AuthAuthController::class,'logout'])->name('logout');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// Admin routes 

Route::resource('categories',CategoryController::class);
Route::resource('users',UserController::class);

// Home routes

Route::get('/',[HomeController::class,'index'])->name('home');
