@extends('customer.layout')

@section('content')
   @include('customer.index-component.home')

  @include('customer.index-component.features')

  @include('customer.index-component.products')

  @include('customer.index-component.testimonial')

  @include('customer.index-component.faq')

  @include('customer.index-component.news-letter')

  @include('customer.index-component.contact')

@endsection
