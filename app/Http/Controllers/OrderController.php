<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //


    public function index()
    {
        $orderData = Order::orderBy('created_at','DESC')->get();
        return view('admin.orders')->with(compact('orderData'));
    }

    public function update(Request $request)
    {
        try
        {
            $data = Order::find($request->id);

            $formData = [
                "status" => $request->status,
                "status_text"=>$request->status_text,
            ];

            $data->update($formData);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }

    }

}
