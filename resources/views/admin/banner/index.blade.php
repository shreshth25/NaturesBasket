@extends('admin.layout')
@section('content')
<div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <span class="card-title my-auto">Banners</span>
        <a href="{{route('banner.create')}}" class="btn btn-warning float-right">Add</a>
      </div>
      <div class="card-body">
        <table id="category_table" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>S.no</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($bannerData as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td><img src="{{asset('images/'.$item->image)}}" style="width: 100px; height:100px"></td>
                <td><a href="{{route('banner.edit',$item->id)}}"><i class="fa fa-edit" style="font-size:20px;"></i></a></td>
              </tr>
              @endforeach

        </table>
      </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
      $(function () {
        $('#category_table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            });
  });
</script>
@endsection
