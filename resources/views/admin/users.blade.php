@extends('admin.layout')
@section('content')
<div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <span class="card-title my-auto">Users</span>
      </div>
      <div class="card-body">
        <table id="category_table" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>S.no</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($users as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
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
