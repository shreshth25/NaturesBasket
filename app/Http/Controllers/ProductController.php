<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $productData = $this->model->all();
        return view('admin.product.index')->with(compact('productData'));
    }

    public function create()
    {
        $categoryData = Category::all();
        return view('admin.product.create')->with(compact('categoryData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=>'required',
            'description'=>'required',
            'image'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required'
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
                    "price"=> $request->price,
                    "stock" => $request->stock,
                    "category_id" =>$request->category_id,
                    "created_by_id"=>Auth::user()->id,
                    "updated_by_id"=>Auth::user()->id
                ];

                $this->model->create($formData);
                return redirect()->back()->with('success','Product created');
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
        $productData = $this->model->find($id);
        $categoryData = Category::all();
        return view('admin.product.edit')->with(compact('productData','categoryData'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            "title"=>'required',
            'description'=>'required',
            'image'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required'
        ]);


        try
        {
            $productData = $this->model->find($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);

                $formData = [
                    "title"=>$request->title,
                    "description"=>$request->description,
                    "image" => $name,
                    "price"=> $request->price,
                    "stock" => $request->stock,
                    "category_id" =>$request->category_id,
                    "updated_by_id"=>Auth::user()->id
                ];

                $productData->update($formData);
                return redirect()->back()->with('success','Product updated');
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
}
