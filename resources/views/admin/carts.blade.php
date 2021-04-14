@extends('admin.layout')
@section('content')
<div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <span class="card-title my-auto">Carts</span>
      </div>
      <div class="card-body">
        <table id="category_table" class="table table-bordered table-hover table-responsive-lg">
          <thead>
          <tr>
            <th>S.no</th>
            <th>User</th>
            <th>Product id</th>
            <th>Product title</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($cartData as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->getUser->email}}</td>
                <td>{{$item->getProduct->id}}</td>
                <td>{{$item->getProduct->title}}</td>
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
