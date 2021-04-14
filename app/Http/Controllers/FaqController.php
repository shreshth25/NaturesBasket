<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    //
    protected $model;

    public function __construct(faq $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $faqData = $this->model->all();
        return view('admin.faq.index')->with(compact('faqData'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "question"=>'required',
            'answer'=>'required'
        ]);

        try
        {
            $formData = [
                "question"=>$request->question,
                "answer"=>$request->answer,
                'order_ids'=>0
            ];
            $this->model->create($formData);
            return redirect()->back()->with('success','Faq created');
        }
        catch(Exception $e)
        {
            Log ::error($e->getMessage());
            return redirect()->back()->with('error','wrong credentials');

        }
    }

    public function edit($id)
    {
        $faqData = $this->model->find($id);
        return view('admin.faq.edit')->with(compact('faqData'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            "question"=>'required',
            'answer'=>'required'
        ]);

        try
        {
            $faqData = $this->model->find($id);
            $formData = [
                "question"=>$request->question,
                "answer"=>$request->answer,
            ];
            $faqData->update($formData);
            return redirect()->back()->with('success','Category updated');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','wrong credentials');

        }
    }
}
