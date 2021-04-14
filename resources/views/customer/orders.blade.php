@extends('customer.layout')

@section('content')
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="section-title">
                        <h1 class="title">All products</h1>
                        <h2 class="subtitle">Get all products at your doorstep</h2>
                    </div>
                </div>
            </div>
            @php
                $total = 0;
            @endphp
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S no</th>
                        <th scope="col">Order id</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderData as $item)
                        @php
                            $total = 0;
                        @endphp
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->order_id }}</td>
                            <td>
                                @php
                                    $data = json_decode($item->cart_data);
                                @endphp

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S no.</th>
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
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

@endsection
