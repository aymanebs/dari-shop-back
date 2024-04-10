<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Seller\CartController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PayementController;
use App\Http\Controllers\User\ProfileController;
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

Route::get('/login',[AuthAuthController::class,'login'])->name('login_page');
Route::get('/registration',[AuthAuthController::class,'registration'])->name('registration');
Route::post('/register',[AuthAuthController::class,'register'])->name('register');
Route::post('/login',[AuthAuthController::class,'loginUser'])->name('login');

Route::middleware('authCheck')->group(function () {
    Route::get('/home',[Controller::class,'index'])->name('home');  
    Route::get('/logout',[AuthAuthController::class,'logout'])->name('logout');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// Admin routes 
Route::prefix('admin')->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::post('/users/ban/{user}',[AdminUserController::class,'banUser'])->name('users.ban');
    Route::post('/users/unban/{user}',[AdminUserController::class,'unbanUser'])->name('users.unban');
    Route::resource('users',AdminUserController::class);
    Route::get('/products',[AdminProductController::class,'index'])->name('admin.products');
    Route::post('/products/accept/{product}',[AdminProductController::class,'accept'])->name('products.accept');
    Route::delete('/products/destroy/{product}',[AdminProductController::class,'destroy'])->name('products.destroy');
});


// Home routes

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('banCheck');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');

// Seller routes

Route::resource('seller/products',SellerProductController::class);

// Customer routes

Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::get('/profile/wishlist',[ProfileController::class,'wishlist'])->name('profile.wishlist');
Route::resource('orders',OrderController::class);
Route::get('/profile/edit-adress',[ProfileController::class,'editAdress'])->name('profile.edit-adress');
Route::get('/profile/edit-password',[ProfileController::class,'editPassword'])->name('profile.edit-password');
Route::patch('/profile/update/{customer}',[ProfileController::class,'update'])->name('profile.update');
Route::get('/cart',[UserCartController::class,'index'])->name('cart.index');
Route::post('/cart/add/{product}',[UserCartController::class,'store'])->name('cart.store');
Route::delete('/cart/remove/{product}',[UserCartController::class,'removeFromCart'])->name('cart.remove');
Route::patch('/cart/update/{product}',[UserCartController::class,'update']);
Route::get('/details/{product}',[SellerProductController::class,'show'])->name('product.details');

// Checkout routes
Route::get('/checkout/adress',[CheckoutController::class,'adressIndex'])->name('checkout.adress');
Route::get('/checkout/delivery',[CheckoutController::class,'deliveryIndex'])->name('checkout.delivery');
Route::get('/checkout/payment',[CheckoutController::class,'paymentIndex'])->name('checkout.payment');
Route::get('/checkout/review',[CheckoutController::class,'reviewIndex'])->name('checkout.review');
Route::get('/checkout/confirm',[CheckoutController::class,'confirmIndex'])->name('checkout.confirmation');
Route::post('/payment',[PayementController::class,'payment'])->name('payment');


