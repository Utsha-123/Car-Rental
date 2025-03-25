@extends('layouts.app')

@section('content')

<body>
  <!-- header -->
  <header>
    <div class="header__container" id="home">
      <div class="header__image">
        <img src="{{ asset('images/header.png') }}" alt="header" />
      </div>
      <div class="header__content">
        <h2><i class="fa-regular fa-thumbs-up " style="color: #FFD43B;"></i>100% Trusted car rental platform</h2>
        <h1>FAST AND EASY WAY TO RENT A CAR</h1>
        <p class="section__description">
          Discover a seamless car rental experience with us. Choose from a
          range of premium vehicles to suit your style and needs, and hit the
          road with confidence. Quick, easy, and reliable - rent your ride
          today!
        </p>
      </div>
    </div>
  </header>

  <section class="header__form">
    <form action="/">
      <div class="input__group">
        <label for="location">Pick up & Return location</label>
        <input
          type="text"
          name="location"
          id="location"
          placeholder="Dallas, Texas" />
      </div>
      <div class="input__group">
        <label for="start">Pick up date</label>
        <input
          type="date"
          name="start"
          id="start"
          placeholder="Aug 16, 10:00 AM" />
      </div>
      <div class="input__group">
        <label for="stop">Return date</label>
        <input
          type="date"
          name="stop"
          id="stop"
          placeholder="Aug 18, 10:00 PM" />
      </div>
      <button class="btn">Search <i class="ri-search-line"></i></button>
    </form>
  </section>

  <!-- About Us -->

  <section class="section__container about__container" id="about">
    <h2 class="section__header">How it work</h2>
    <p class="section__description">
      Renting a car with us is simple! Choose your vehicle, pick your dates,
      and complete your booking. We'll handle the rest, ensuring a smooth
      start to your journey.
    </p>
    <div class="about__grid">
      <div class="about__card">
        <span><i class="ri-map-pin-2-fill"></i></span>
        <h4>Choose Location</h4>
        <p>
          Select from a variety of pick-up locations that best suit your
          needs, whether it's close to home, work, or airport.
        </p>
      </div>
      <div class="about__card">
        <span><i class="ri-calendar-event-fill"></i></span>
        <h4>Pick-up Date</h4>
        <p>
          Choose the exact date and time for your car pick-up, ensuring that
          your vehicle is ready when you need it.
        </p>
      </div>
      <div class="about__card">
        <span><i class="ri-roadster-fill"></i></span>
        <h4>Book your Car</h4>
        <p>
          Complete your booking with just a few clicks, and we'll prepare your
          vehicle to ensure a hassle-free pick-up.
        </p>
      </div>
    </div>
  </section>

  <!-- Deals -->
<section class="deals" id="deals">
  <div class="section__container deals__container">
    <h2 class="section__header">Most popular car rental deals</h2>
    <p class="section__description">
      Explore our top car rental deals, handpicked to give you the best
      value and experience. Book now and drive your favorite ride at an
      incredible rate!
    </p>
    <div class="deals__tabs">
    @foreach($categories as $category)
        <a href="{{ route('deals', ['category_id' => $category->id]) }}" 
           class="btn {{ request('category_id') == $category->id ? 'active' : '' }}">
            {{ $category->name }}
        </a>
    @endforeach
      
    </div>


    <div id="Tesla" class="tab__content active">
      @foreach($products as $datas)
      <div class="deals__card">
        <?php
        $decodedImages = json_decode($datas->product_image, true);
        ?>

        @if(!empty($decodedImages) && is_array($decodedImages))
        <!-- Bootstrap Carousel -->
        <div id="carousel{{$datas->id}}" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach ($decodedImages as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <img src="{{ asset('products/'.$image) }}" class="d-block w-100" alt="Product Image">
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$datas->id}}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><-</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$datas->id}}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">-></span>
          </button>
        </div>
        @else
        <span class="text-gray-500">No images available</span>
        @endif

        <div class="deals__rating">
          <span><i class="ri-star-fill"></i></span>
          <span><i class="ri-star-fill"></i></span>
          <span><i class="ri-star-fill"></i></span>
          <span><i class="ri-star-fill"></i></span>
          <span><i class="ri-star-line"></i></span>
          <span>(550)</span>
        </div>
        <h4>{{ $datas->name }}</h4>
        <div class="deals__card__grid">
          <div>
                <span><i class="ri-group-line"></i></span> 4 People
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Autopilot
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 400km
              </div>
          <div>
            <span><i class="ri-car-line"></i></span> Electric
          </div>
        </div>
        <hr />
        <div class="deals__card__footer">
          <h3>${{$datas->price}}</h3>
          <a href="{{ route('book.vehicle', $datas->id) }}">
            Rent Now
            <span><i class="ri-arrow-right-line"></i></span>
          </a>
        </div>
      </div>
      @endforeach



    </div>
  </div>
  </div>
</section>

  <!-- why choose us -->

  <section class="choose__container" id="choose">
    <div class="choose__image">
      <img src="{{ asset('images/choose.png') }}" alt="choose" />
    </div>
    <div class="choose__content">
      <h2 class="section__header">Why choose us</h2>
      <p class="section__description">
        Discover the difference with our car rental service. We offer reliable
        vehicles, exceptional customer service, and competitive pricing to
        ensure a seamless rental experience.
      </p>
      <div class="choose__grid">
        <div class="choose__card">
          <span><i class="ri-customer-service-line"></i></span>
          <div>
            <h4>Customer Support</h4>
            <p>Our dedicated support team is available to assist you 24/7.</p>
          </div>
        </div>
        <div class="choose__card">
          <span><i class="ri-map-pin-line"></i></span>
          <div>
            <h4>Many Locations</h4>
            <p>
              Convenient pick-up and drop-off locations to suit your travel
              needs.
            </p>
          </div>
        </div>
        <div class="choose__card">
          <span><i class="ri-wallet-line"></i></span>
          <div>
            <h4>Best Price</h4>
            <p>Enjoy competitive rates and great value for every rental.</p>
          </div>
        </div>
        <div class="choose__card">
          <span><i class="ri-user-star-line"></i></span>
          <div>
            <h4>Experience Driver</h4>
            <p>Reliable, professional drivers available upon request.</p>
          </div>
        </div>
        <div class="choose__card">
          <span><i class="ri-verified-badge-line"></i></span>
          <div>
            <h4>Verified Brands</h4>
            <p>Choose from trusted and well-maintained car brands.</p>
          </div>
        </div>
        <div class="choose__card">
          <span><i class="ri-calendar-close-line"></i></span>
          <div>
            <h4>Free Cancellations</h4>
            <p>Flexible bookings with free cancellation options.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- subscribe -->
  <section class="subscribe__container">
    <div class="subscribe__image">
      <img src="{{ asset('images/subscribe.png') }}" alt="subscribe" />
    </div>
    <div class="subscribe__content">
      <h2 class="section__header">
        Subscribe for the latest car rental updates
      </h2>
      <p class="section__description">
        Stay in the know! Subscribe to receive the latest car rental deals,
        exclusive offers, and updates right to your inbox. Don't miss out on
        special promotions and the newest additions to our fleet.
      </p>
      <form action="/">
        <input type="text" placeholder="Your Email" />
        <button class="btn">Subscribe</button>
      </form>
    </div>
  </section>

  <!-- testimonials -->
  <section class="section__container client__container" id="client">
    <h2 class="section__header">What people say about us?</h2>
    <p class="section__description">
      Discover why our customers love renting with us! Read real reviews and
      testimonials to see how we deliver exceptional service.
    </p>
    <!-- Slider main container -->
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="client__card">
            <div class="client__details">
              <img src="{{ asset('images/client-1.jpg') }}" alt="client" />
              <div>
                <h4>Sarah Johnson</h4>
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-line"></i></span>
                </div>
              </div>
            </div>
            <p>
              I had an amazing experience renting a car from this service. The
              booking process was quick and easy, and the car was in perfect
              condition. Highly recommend!
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <div class="client__details">
              <img src="{{ asset('images/client-2.jpg') }}" alt="client" />
              <div>
                <h4>Michael Adams</h4>
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-line"></i></span>
                </div>
              </div>
            </div>
            <p>
              Customer support was excellent! They helped me with all my
              questions, and I felt confident about my booking. I will
              definitely rent from them again.
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <div class="client__details">
              <img src="{{ asset('images/client-3.jpg') }}" alt="client" />
              <div>
                <h4>Emily Martinez</h4>
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-line"></i></span>
                </div>
              </div>
            </div>
            <p>
              Affordable prices and great selection of vehicles! I found
              exactly what I needed, and the pick-up and drop-off process was
              seamless. Very happy with my rental.
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <div class="client__details">
              <img src="{{ asset('images/client-4.jpg') }}" alt="client" />
              <div>
                <h4>Jason Lee</h4>
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-line"></i></span>
                </div>
              </div>
            </div>
            <p>
              The flexibility of free cancellations made my trip stress-free.
              I ended up changing my plans, and it was no hassle to adjust my
              booking. Great service overall!
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <div class="client__details">
              <img src="{{ asset('images/client-5.jpg') }}" alt="client" />
              <div>
                <h4>David Thompson</h4>
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-line"></i></span>
                </div>
              </div>
            </div>
            <p>
              The car I rented was top-notch, and the driver was very
              experienced. It made my road trip so much more enjoyable. Will
              use them again next time!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>
@endsection