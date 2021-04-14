{{-- <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{route('home')}}">Nature's Basket</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <span class="text-white">{{Auth::user()->balance}}</span>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('paywithrazorpay')}}">Pay</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('cart')}}">Cart Page</a>
          </li>


        </ul>
      </div>
    </div>
  </nav> --}}


  <header class="header fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-md  navbar-light">
        <!-- Brand -->
        <a class="navbar-brand" href="/"><img src="{{asset('customer/img/watch-05.png')}}" style="height: 40px; width:40px" alt="watch"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto" >
            <li class="nav-item">
              <a class="nav-link active" href="/#home" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#products">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#testimonial">Testimonial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#faq">Faq</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/#contact">Contact</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/cart">Cart</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/products">All products</a>
            </li>

            <li class="nav-item">
                <a  class="nav-link" href="{{route('pay-more')}}">  Rs {{Auth::user()->balance}}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('orders')}}">orders</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="/logout">logout</a>
            </li>

          </ul>
        </div>
      </nav>

    </div>
  </header>
