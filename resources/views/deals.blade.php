@extends('layouts.app')

@section('content')

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
      <button class="btn active" data-id="Tesla">Tesla</button>
      <button class="btn" data-id="Mitsubishi">Mitsubishi</button>
      <button class="btn" data-id="Mazda">Mazda</button>
      <button class="btn" data-id="Toyota">Toyota</button>
      <button class="btn" data-id="Honda">Honda</button>
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
            <span><i class="ri-group-line"></i></span> {{ $datas->description }}
          </div>

          <div>
            <span><i class="ri-car-line"></i></span> Electric
          </div>
        </div>
        <hr />
        <div class="deals__card__footer">
          <h3>$180<span>/Per Day</span></h3>
          <a href="#">
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

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (and Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


@endsection