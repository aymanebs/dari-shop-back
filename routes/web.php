<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::post('/orderCreate', [CheckoutController::class, 'createOrder'])->name('order.create');



Route::get('/login', [AuthAuthController::class, 'login'])->name('login_page');
Route::get('/registration', [AuthAuthController::class, 'registration'])->name('registration');
Route::post('/register', [AuthAuthController::class, 'register'])->name('register');
Route::post('/login', [AuthAuthController::class, 'loginUser'])->name('login');

Route::middleware('authCheck')->group(function () {
     Route::get('/home', [Controller::class, 'index'])->name('home');
     Route::get('/logout', [AuthAuthController::class, 'logout'])->name('logout');
});

// Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// Admin routes 
Route::prefix('admin')->middleware(['authCheck', 'adminCheck'])->group(function () {
     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
     Route::resource('categories', CategoryController::class);
     Route::post('/users/ban/{user}', [AdminUserController::class, 'banUser'])->name('users.ban');
     Route::post('/users/unban/{user}', [AdminUserController::class, 'unbanUser'])->name('users.unban');
     Route::resource('users', AdminUserController::class);
     Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products');
     Route::post('/products/accept/{product}', [AdminProductController::class, 'accept'])->name('products.accept');
     Route::delete('/products/destroy/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
});


// Home routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/details/{product}', [SellerProductController::class, 'show'])->name('product.details')->middleware('banCheck');
// Catalog routes

Route::prefix('catalog')->middleware('banCheck')->group(function () {

     Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
     Route::post('/filter', [CatalogController::class, 'filter'])->name('catalog.filter');
     Route::get('/getProducts', [CatalogController::class, 'getProducts'])->name('catalog.getProducts');
     Route::get('/{category}', [CatalogController::class, 'showCategory'])->name('catalog.category');
     Route::get('/{category}/getProducts', [CatalogController::class, 'productsByCategory'])->name('catalog.getProductsByCategory');
});


// Seller routes

Route::prefix('seller')->middleware(['authCheck', 'banCheck', 'sellerCheck'])->group(function () {
     Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
     Route::resource('/products', SellerProductController::class);
});




// Customer routes

// Profile routes

Route::prefix('profile')->middleware(['authCheck', 'banCheck', 'customerCheck'])->group(function () {
     Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/update/{customer}', [ProfileController::class, 'update'])->name('profile.update');
     Route::get('/edit-adress', [ProfileController::class, 'editAdress'])->name('profile.edit-adress');
     Route::patch('/update-adress', [ProfileController::class, 'updateAdress'])->name('profile.update-adress');
     Route::get('/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
     Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
     Route::get('/orders', [ProfileController::class, 'listOrders'])->name('profile.orders');
});


// Cart routes
Route::prefix('cart')->middleware('authCheck', 'banCheck', 'customerCheck')->group(function () {
     Route::get('/', [UserCartController::class, 'index'])->name('cart.index');
     Route::post('/add/{product}', [UserCartController::class, 'store'])->name('cart.store');
     Route::delete('/remove/{product}', [UserCartController::class, 'removeFromCart'])->name('cart.remove');
     Route::post('/update-cart', [UserCartController::class, 'updateCart'])->name('cart.update');
     Route::get('/cartData', [UserCartController::class, 'getCartData'])->name('cart.data');
});


// Checkout routes

Route::prefix('checkout')->middleware('authCheck', 'banCheck', 'customerCheck')->group(function () {

     Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
     Route::post('/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
     Route::get('/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
     Route::get('/failure', [CheckoutController::class, 'failure'])->name('checkout.failure');
     Route::get('/review/{orderId}', [CheckoutController::class, 'review'])->name('checkout.review');
});
