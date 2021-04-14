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
      <div class="row">
          @foreach ($faqData as $item)
          <div class="col-md-6">
            <div class="faq-item">
              <h4>{{$item->question}}</h4>
              <p>{{$item->answer}}</p>
            </div>
          </div>
          @endforeach

      <div class="col-lg-12">
        <p class="support-text text-center">Any Question  <a href="#">info@gmail.com</a></p>
      </div>
    </div>
  </section>
