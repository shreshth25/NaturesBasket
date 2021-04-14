<section class="products-section" id="products">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <div class="section-title">
            <h1 class="title">Our Products</h1>
            <h2 class="subtitle"> We have lots pf exellents and high quality products</h2>
          </div>
        </div>
        </div>

        <div class="row">

            <div class="owl-carousel" id="product-carousel">

                @foreach ($productData as $item)
                <div class="col-lg-12">
                    <div class="products-item">
                      <div class="product-img">
                          <img class="img-fluid"src="{{asset('images/'.$item->image)}}" alt="photo">
                          <div class="overlay d-flex">
                            <a href="/products" class="btn mybtn1">Buy now</a>
                          </div>
                      </div>
                      <div class="product-content">
                        <div class="product-price">
                          <span class="new-price">{{$item->price}}</span>
                          <span class="old-price">{{$item->price+100}}</span>
                        </div>
                        <h5 class="product-name">{{$item->title}}</h5>
                      </div>
                    </div>
                  </div>
                @endforeach




        </div>
      </div>
      </div>

  </section>
