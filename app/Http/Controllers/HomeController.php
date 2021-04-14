<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\faq;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderPlaced;
use Exception;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //

    public function index()
    {
        $productData = Product::all();
        $bannerData = Banner::all();
        $faqData = faq::all();
        return view('customer.index')->with(compact('productData','bannerData','faqData'));
    }


    public function cart()
    {
        $cartData = Cart ::with('getUser','getProduct')->get();
        return view('customer.cartPage')->with(compact('cartData'));
    }


    public function products()
    {
        $productData = Product::all();
        return view('customer.products')->with(compact('productData'));
    }

    public function addToCart($id)
    {
        $dataExist = Cart::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
        if($dataExist)
        {
            $formData = [
                "count"=>$dataExist->count+1,
            ];
            $dataExist->update($formData);
            return redirect()->route('cart');
        }
        try
        {
            $formData = [
                "user_id"=>Auth::user()->id,
                "product_id"=>$id,
                "count"=>1,
                "status"=>0
            ];

            Cart::create($formData);
            return redirect()->route('cart');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Some error');
        }
    }


    public function removeToCart($id)
    {
        $data = Cart::find($id);
        if($data->count==1)
        {
            $data->delete();
            return redirect()->route('cart');
        }
        else
        {
            $formData = [
                "count" => $data->count-1
            ];

            $data->update($formData);
            return redirect()->route('cart');
        }
    }

    public function paynow($amount)
    {
        if($amount==0 || $amount<0)
        {
            return redirect()->route('cart');
        }
        if(Auth::user()->balance>$amount)
        {
            try
            {
            $user = Auth::user();

            $data = Cart::where('user_id',Auth::user()->id)->get();
            $formData = [
                'cart_data'=>$data,
                'user_id'=>Auth::user()->id,
                'order_id'=>Str::uuid()->toString(),
            ];
            $orderInfo = Order::create($formData);
            Cart::where('user_id',Auth::user()->id)->delete();
            $user->withdraw($amount);
            $user = User::where('role',1)->first();
            $user->notify(new OrderPlaced($orderInfo->id));
            return redirect()->route('cart');
        }
            catch(Exception $e)
            {
                Log::error($e->getMessage());
                return $e;
            }
        }
        else
        {
            return redirect()->route('cart');
        }
    }

    public function paymore()
    {
        return view('customer.payMore');
    }

    public function order()
    {
       $orderData = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
       return view('customer.orders')->with(compact('orderData'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
