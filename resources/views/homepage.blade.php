<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Slider Example</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <style>
    .image-slider {
      width: 100%;
      margin: 0 auto;
    }

    .image-slider img {
      width: 100%;
      height: auto;
    }

    .deals__card {
      border: 1px solid #ccc;
      padding: 20px;
      max-width: 300px;
      margin: 0 auto;
    }

    .deals__rating span,
    .deals__card__grid span,
    .deals__card__footer span {
      margin-right: 5px;
    }

    .deals__card__footer a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>
<body>
  <div class="deals__card">
    <div class="image-slider">
      <img src="{{ asset('images/deals-1.png') }}" alt="Product Image" class="border border-gray-300 img-thumbnail mb-2">
      <img src="{{ asset('images/deals-1.png') }}" alt="Product Image" class="border border-gray-300 img-thumbnail mb-2">
      <img src="{{ asset('images/deals-1.png') }}" alt="Product Image" class="border border-gray-300 img-thumbnail mb-2">
    </div>
    <div class="deals__rating">
      <span>⭐</span>
      <span>⭐</span>
      <span>⭐</span>
      <span>⭐</span>
      <span>☆</span>
      <span>(550)</span>
    </div>
    <h4>Product Name</h4>
    <div class="deals__card__grid">
      <div>
        <span>👥</span> Description
      </div>
      <div>
        <span>🚗</span> Electric
      </div>
    </div>
    <hr />
    <div class="deals__card__footer">
      <h3>$180<span>/Per Day</span></h3>
      <a href="#">
        Rent Now
        <span>→</span>
      </a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.image-slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    });
  </script>
</body>
</html>