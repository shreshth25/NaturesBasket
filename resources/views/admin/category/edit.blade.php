@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
    </div>
    <form role="form" action="{{route('category.update',$categoriesData->id)}}" method="POST">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{$categoriesData->slug}}" id="" placeholder="Enter slug name" required>
        </div>

        <div class="form-group">
            <label>Display name</label>
            <input type="text" name="display_name" value="{{$categoriesData->display_name}}" class="form-control" id="" placeholder="Enter slug name" required>
        </div>
        </div>
        <div class="card-footer bg-white">
        <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
    </div>
</div>
@endsection
