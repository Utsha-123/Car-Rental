
@extends('layouts.app')

@section('content')


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
  @endsection