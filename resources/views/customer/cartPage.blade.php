@extends('customer.layout')

@section('content')
<section class="faq-section" id="faq">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <div class="section-title">
            <h1 class="title">About Product</h1>
            <h2 class="subtitle">Its a product time</h2>
          </div>
        </div>
      </div>
      @php
        $total = 0;
      @endphp

      <div class="row mt-5">

        <div class="col-md-6">
            @foreach ($cartData as $item)
            <div class="row mb-2 border p-2">
                <div class="col-md-4">
                    <img src="{{asset('images/'.$item->getProduct->image)}}" style="height: 100px;width:100px">
                </div>
                <div class="col-md-8">
                    <div>
                    {{$item->getProduct->title}}
                    </div>
                    <div>
                    Price per product Rs {{$item->getProduct->price}}
                        </div>
                    <div>
                    Count {{$item->count}}
                    </div>
                    <div>
                        <a href="{{route('removeToCart',$item->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @php
                $total = $total + $item->count* $item->getProduct->price
            @endphp
            @endforeach
        </div>
        <div class="col-md-6">
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
                    @foreach ($cartData as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->getProduct->title}}</td>
                        <td>{{$item->getProduct->price}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{$item->count*$item->getProduct->price}}</td>
                    </tr>
                    @endforeach

                    <tr>
                        <td>Total</td>
                        <td colspan="4" class="text-right">{{$total}}</td>
                    </tr>
                </tbody>
              </table>
              <div class="row">
                  <a href="{{route('pay-now',$total)}}" class="btn btn-success mx-auto w-25">Pay now</a>
              </div>
        </div>
    </div>



  </section>

@endsection
