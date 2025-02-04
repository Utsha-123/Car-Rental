@extends('layouts.app')

@section('content')
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

@endsection