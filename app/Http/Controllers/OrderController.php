<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //


    public function index()
    {
        $orderData = Order::orderBy('created_at','DESC')->get();
        return view('admin.orders')->with(compact('orderData'));
    }


}
