<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        try
        {
            $formData = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ];
            $this->model->create($formData);
            return redirect()->back()->with('success','Created');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Error');

        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            session([
                "user"=>Auth::user(),
                'role'=>Auth::user()->role,
            ]);
            if(Auth::user()->role==0)
            {
                return redirect('/');
            }
            else if(Auth::user()->role==1)
            {
                return redirect('/admin');
            }
        }

        return back()->with('error','wrong credentials');
    }
}
