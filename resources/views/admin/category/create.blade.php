@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Add Category</h3>
    </div>
    <form role="form" action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" id="" placeholder="Enter slug name" required>
        </div>

        <div class="form-group">
            <label>Display name</label>
            <input type="text" name="display_name" class="form-control" id="" placeholder="Enter slug name" required>
        </div>
        </div>
        <div class="card-footer bg-white">
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
