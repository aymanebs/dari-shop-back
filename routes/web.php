<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Seller\CartController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\CatalogController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PayementController;
use App\Http\Controllers\Seller\PaymentController as SellerPaymentController;
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

Route::post('/orderCreate',[CheckoutController::class,'createOrder'])->name('order.create');



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


// Seller routes

Route::resource('seller/products',SellerProductController::class);
Route::get('/seller/dashboard',[SellerDashboardController::class,'index'])->name('seller.dashboard');


// Customer routes

     // Profile routes
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::get('/profile/edit-adress',[ProfileController::class,'editAdress'])->name('profile.edit-adress');
Route::get('/profile/edit-password',[ProfileController::class,'editPassword'])->name('profile.edit-password');
Route::patch('/profile/update/{customer}',[ProfileController::class,'update'])->name('profile.update');
Route::get('/profile/orders',[ProfileController::class,'listOrders'])->name('profile.orders');
    
     // Cart routes
Route::get('/cart',[UserCartController::class,'index'])->name('cart.index');
Route::post('/cart/add/{product}',[UserCartController::class,'store'])->name('cart.store');
Route::delete('/cart/remove/{product}',[UserCartController::class,'removeFromCart'])->name('cart.remove');
Route::get('/details/{product}',[SellerProductController::class,'show'])->name('product.details');
Route::post('/update-cart',[UserCartController::class,'updateCart'])->name('cart.update');

     // Checkout routes

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout/payment',[CheckoutController::class,'payment'])->name('checkout.payment');
Route::get('/checkout/confirmation',[CheckoutController::class,'confirmation'])->name('checkout.confirmation');
Route::get('/checkout/failure',[CheckoutController::class,'failure'])->name('checkout.failure');
Route::get('/checkout/review/{orderId}',[CheckoutController::class,'review'])->name('checkout.review');



// Catalog routes

Route::get('/catalog/alimentation',[CatalogController::class,'alimentation'])->name('catalog.alimentation');
Route::get('/catalog/textiles',[CatalogController::class,'textiles'])->name('catalog.textiles');
Route::get('/catalog/artisanat',[CatalogController::class,'artisanat'])->name('catalog.artisanat');
Route::get('/catalog/beaute',[CatalogController::class,'beaute'])->name('catalog.beaute');
Route::get('/catalog/decoration',[CatalogController::class,'decoration'])->name('catalog.decoration');
Route::get('/catalog',[CatalogController::class,'index'])->name('catalog.index');

Route::post('/catalog/filterByPrice',[CatalogController::class,'filterByPrice'])->name('catalog.filterByPrice');
Route::post('/catalog/filterByCategory',[CatalogController::class,'filterByCategory'])->name('catalog.filterByCategory');
Route::get('/catalog/getProducts',[CatalogController::class,'getProducts'])->name('catalog.getProducts');
Route::post('/catalog/search',[CatalogController::class,'search'])->name('catalog.search');
Route::post('/catalog/sort',[CatalogController::class,'sort'])->name('catalog.sort');


Route::get('/cartData',[UserCartController::class,'getCartData'])->name('cart.data');




