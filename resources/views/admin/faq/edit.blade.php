@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Edit faq</h3>
    </div>
    <form role="form" action="{{route('faq.update',$faqData->id)}}" method="POST">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Question</label>
            <textarea type="text" name="slug" class="form-control" id="" placeholder="Enter question" required>{{$faqData->question}}</textarea>
        </div>

        <div class="form-group">
            <label>Answer</label>
            <textarea type="text" name="display_name" class="form-control" id="" placeholder="Enter answer" required>{{$faqData->answer}}</textarea>
        </div>
        </div>
        <div class="card-footer bg-white">
        <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
    </div>
</div>
@endsection
