<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CartPage;
use App\Http\Livewire\HomePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


#login logout
Route::get('/login',[AuthController::class,'loginPage'])->name('login.page');
Route::get('/register',[AuthController::class,'registerPage'])->name('register.page');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');

#user
Route::middleware(['auth'])->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/logout',[HomeController::class,'logout'])->name('logout');
    Route::get('/cart',[HomeController::class,'cart'])->name('cart');
    Route::get('/products',[HomeController::class,'products'])->name('products');
    Route::get('/order',[HomeController::class,'order'])->name('orders');
    Route::get('/addToCart/{id}',[HomeController::class,'addToCart'])->name('addToCart');
    Route::get('/removeToCart/{id}',[HomeController::class,'removeToCart'])->name('removeToCart');

    Route::get('/pay-now/{amount}',[HomeController::class,'paynow'])->name('pay-now');
    Route::get('/pay-more',[HomeController::class,'paymore'])->name('pay-more');
    Route::get('payment-razorpay',[PaymentController::class,'create'])->name('paywithrazorpay');
    Route::post('payment', [PaymentController::class,'payment'])->name('payment');


});

#admin
Route::prefix('admin')->middleware('auth','admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('dashboard');


    Route::prefix('category')->group(function () {

        Route::get('/',[CategoryController::class,'index'])->name('category.index');

        Route::get('/create',[CategoryController::class,'create'])->name('category.create');

        Route::post('/store',[CategoryController::class,'store'])->name('category.store');

        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');

        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');

        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    });

    Route::prefix('product')->group(function () {

        Route::get('/',[ProductController::class,'index'])->name('product.index');

        Route::get('/create',[ProductController::class,'create'])->name('product.create');

        Route::post('/store',[ProductController::class,'store'])->name('product.store');

        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');

        Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');

        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

    });

    Route::prefix('users')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('users');
    });

    Route::prefix('cart')->group(function(){
        Route::get('/',[CartController::class,'index'])->name('admin.cart');
    });

    Route::prefix('orders')->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('admin.orders');
    });


    Route::prefix('banner')->group(function () {

        Route::get('/',[BannerController::class,'index'])->name('banner.index');

        Route::get('/create',[BannerController::class,'create'])->name('banner.create');

        Route::post('/store',[BannerController::class,'store'])->name('banner.store');

        Route::get('/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');

        Route::post('/update/{id}',[BannerController::class,'update'])->name('banner.update');

        Route::get('/delete/{id}',[BannerController::class,'delete'])->name('banner.delete');

    });


    Route::prefix('faq')->group(function () {

        Route::get('/',[FaqController::class,'index'])->name('faq.index');

        Route::get('/create',[FaqController::class,'create'])->name('faq.create');

        Route::post('/store',[FaqController::class,'store'])->name('faq.store');

        Route::get('/edit/{id}',[FaqController::class,'edit'])->name('faq.edit');

        Route::post('/update/{id}',[FaqController::class,'update'])->name('faq.update');

        Route::get('/delete/{id}',[FaqController::class,'delete'])->name('faq.delete');

    });

});

