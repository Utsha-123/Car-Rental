@extends('layouts.app')

@section('content')

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

@endsection