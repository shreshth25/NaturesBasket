<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $categoriesData = $this->model->all();
        return view('admin.category.index')->with(compact('categoriesData'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "slug"=>'required',
            'display_name'=>'required'
        ]);

        try
        {
            $formData = [
                "slug"=>$request->slug,
                "display_name"=>$request->display_name,
                "created_by_id"=>Auth::user()->id,
                "updated_by_id"=>Auth::user()->id
            ];
            $this->model->create($formData);
            return redirect()->back()->with('success','Category created');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','wrong credentials');

        }
    }

    public function edit($id)
    {
        $categoriesData = $this->model->find($id);
        return view('admin.category.edit')->with(compact('categoriesData'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            "slug"=>'required',
            'display_name'=>'required'
        ]);

        try
        {
            $categoriesData = $this->model->find($id);
            $formData = [
                "slug"=>$request->slug,
                "display_name"=>$request->display_name,
                "updated_by_id"=>Auth::user()->id
            ];
            $categoriesData->update($formData);
            return redirect()->back()->with('success','Category updated');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','wrong credentials');

        }
    }
}
