@extends('admin.layout')
@section('content')
<div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <span class="card-title my-auto">Orders</span>
      </div>
      <div class="card-body">
        <table class="table table-bordered" id="order_table">
            <thead>
                <tr>
                    <th scope="col">Order id</th>
                    <th scope="col">User</th>
                    <th scope="col">Date</th>
                    <th scope="col">Info</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orderData as $item)
                    @php
                        $total = 0;
                    @endphp
                    <tr>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->getUser->name }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            @php
                                $data = json_decode($item->cart_data);
                            @endphp

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Sno.</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">count</th>
                                        <th scope="col">Sum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item2)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item2->get_product->title }}</td>
                                            <td>{{ $item2->get_product->price }}</td>
                                            <td>{{ $item2->count }}</td>
                                            <td>{{ $item2->count * $item2->get_product->price }}</td>
                                            @php
                                                $total = $total + $item2->count * $item2->get_product->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Total</td>
                                        <td colspan="4" class="text-right">{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            update
                          </button></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
      </div>
    </div>
</div>
@include('admin.modal.orderUpdate')
@endsection


@section('scripts')
<script>
  $(document).ready(function() {
    $('#order_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ],
    } );
} );
</script>
@endsection
