<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        $categoriesCount = Category::get()->count();
        $productCount = Product::get()->count();
        $usersCount = User::get()->count();
        $bannerCount = Banner::get()->count();
        $cartCount = Cart::get()->count();
        $orderCount = Order::get()->count();
        return view('admin.dashboard')->with(compact('categoriesCount','productCount','usersCount','cartCount','orderCount','bannerCount'));
    }
}
