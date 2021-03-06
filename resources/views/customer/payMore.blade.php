@extends('customer.layout')

@section('content')
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="section-title">
                        <h1 class="title">Pay via upi</h1>
                        <h2 class="subtitle">Add money and pay</h2>
                        Your current balance is Rs {{Auth::user()->balance}}
                    </div>
                </div>
            </div>
            @php
                $input = 0;
            @endphp
                <form class="contact-form">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <input type="text"  class="form-control amount" placeholder="Enter the amount">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" id="rzp-button1" class="btn mybtn2 mx-auto">Pay now
                                </button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
    </section>
@endsection
@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $('body').on('click','#rzp-button1',function(e){
        e.preventDefault();
        var amount = $('.amount').val();
        if(amount=="" || amount<1)
        {
            return;
        }
        var total_amount = amount * 100;
        var options = {
            "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
            "currency": "INR",
            "name": "Nature's Basket",
            "description": "Fresh and Pure",
            "image": "{{asset('customer/img/watch-05.png')}}",
            "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response){
                $.ajax({
                    type:'POST',
                    url:"{{ route('payment') }}",
                    data:{
                        razorpay_payment_id:response.razorpay_payment_id,
                        amount:amount,
                        "_token": "{{ csrf_token() }}"

                    },
                    success:function(data){
                        window.location.reload();
                    },
                    error:function(response)
                    {
                        console.log(response);
                    }
                });
            },
            "prefill": {
                "name": "{{Auth::user()->name}}",
                "email": "{{Auth::user()->email}}",
                "contact": ""
            },
            "notes": {
                "address": "test test"
            },
            "theme": {
                "color": "#2E8B57"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    });
</script>
@endsection
