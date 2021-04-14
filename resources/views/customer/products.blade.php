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
      <div class="row">
          @foreach ($productData as $item)
          <div class="col-md-3">
            <div class="box p-2">
                <div class="card">
                    <img src="{{asset('images/'.$item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->title}}</h5>
                      <p class="card-text">{{$item->description}}</p>
                      <p class="card-text text-success fw-bold">Rs {{$item->price}}</p>
                      <a href="{{route('addToCart',$item->id)}}" class="btn btn-primary">Add to cart</a>
                    </div>
                  </div>
            </div>
        </div>
          @endforeach

    </div>
  </section>

@endsection
