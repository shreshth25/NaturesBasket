@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Edit Banner</h3>
    </div>
    <form action="{{route('banner.update',$bannerData->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Title</label>
            <input type="text" value="{{$bannerData->title}}" name="title" class="form-control" id="" placeholder="Enter title" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" value="{{$bannerData->description}}" name="description" class="form-control" id="" placeholder="Enter description" required>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" id="" placeholder="Enter image" required>
        </div>

        </div>
        <div class="card-footer bg-white">
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
