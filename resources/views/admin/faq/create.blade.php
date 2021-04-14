@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Add Faq</h3>
    </div>
    <form role="form" action="{{route('faq.store')}}" method="POST">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Question</label>
            <textarea name="question" class="form-control" id="" placeholder="Enter question" required></textarea>
        </div>

        <div class="form-group">
            <label>Answer</label>
            <textarea name="answer" class="form-control" id="" placeholder="Enter answer" required></textarea>
        </div>
        </div>
        <div class="card-footer bg-white">
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
