<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Session;
use Redirect;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payWithRazorpay');
    }

    public function payment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

            } catch (\Exception $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Auth::user()->deposit($payment['amount']/100);
        return redirect()->back();
    }
}
