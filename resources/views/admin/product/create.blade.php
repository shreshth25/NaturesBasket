@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Add Product</h3>
    </div>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" id="" placeholder="Enter title" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" id="" placeholder="Enter description" required>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" id="" placeholder="Enter image" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" id="" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" id="" placeholder="Enter description" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select type="text" name="category_id" class="form-control" id="" placeholder="Enter stock" required>
                @foreach ($categoryData as $item)
                    <option value="{{$item->id}}">{{$item->display_name}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="card-footer bg-white">
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
