<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    //
    protected $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $bannerData = $this->model->all();
        return view('admin.banner.index')->with(compact('bannerData'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        try
        {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);

                $formData = [
                    "title"=>$request->title,
                    "description"=>$request->description,
                    "image" => $name,
                    "order" => 0,
                    "created_by_id"=>Auth::user()->id,
                    "updated_by_id"=>Auth::user()->id
                ];

                $this->model->create($formData);
                return redirect()->back()->with('success','Banner created');
            }
            else
            {
                return redirect()->back()->with('error','Unable to create');
            }

        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','wrong credentials');

        }
    }

    public function edit($id)
    {
        $bannerData = $this->model->find($id);
        return view('admin.banner.edit')->with(compact('bannerData'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            "title"=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);


        try
        {
            $bannerData = $this->model->find($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);


            $formData = [
                "title"=>$request->title,
                "description"=>$request->description,
                "image" => $name,
                "updated_by_id"=>Auth ::user()->id
            ];
            $bannerData->update($formData);
            return redirect()->back()->with('success','Banner updated');
        }
        else
        {
            return redirect()->back()->with('error','wrong credentials');
        }

        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','wrong credentials');

        }
    }
}
