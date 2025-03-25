<!-- header footer -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <script src="https://unpkg.com/scrollreveal"></script>

  <title>Go Ride</title>
</head>

<body>
  <header>
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="{{route('welcome')}}" class="logo">
            <img src="{{ asset('images/your_image.png') }}" alt="logo" class="logo-white" />
            <span>Go Ride</span>
          </a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="{{route('welcome')}}">Home</a></li>
        <li><a href="{{route('about-us')}}">About</a></li>
        <li><a href="{{route('deals')}}">Rental Deals</a></li>
        <li><a href="{{route('choose-us')}}">Why Choose Us</a></li>
        <li><a href="{{route('testimonials')}}">Testimonials</a></li>
        <!-- <li><a href="{{route('registration')}}">Register</a></li> -->

        <!-- Other navigation items -->

        @guest
        <li><button>
            <a href="{{ route('login') }}" title="Login">
              Register
            </a></button>
        </li>
        @else
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link">
              Logout
            </button>
          </form>
        </li>
        @endguest



      </ul>
    </nav>

  </header>
  @yield('content')
  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="footer__logo">
          <a href="#" class="logo">
            <img src="assets/logo-white.png" alt="logo" />
            <span>Go Ride</span>
          </a>
        </div>
        <p>
          We're here to provide you with the best vehicles and a seamless
          rental experience. Stay connected for updates, special offers, and
          more. Drive with confidence!
        </p>
        <ul class="footer__socials">
          <li>
            <a href="#"><i class="ri-facebook-fill"></i></a>
          </li>
          <li>
            <a href="#"><i class="ri-twitter-fill"></i></a>
          </li>
          <li>
            <a href="#"><i class="ri-linkedin-fill"></i></a>
          </li>
          <li>
            <a href="#"><i class="ri-instagram-line"></i></a>
          </li>
          <li>
            <a href="#"><i class="ri-youtube-fill"></i></a>
          </li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Our Services</h4>
        <ul class="footer__links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#deals">Rental Deals</a></li>
          <li><a href="#choose">Why Choose Us</a></li>
          <li><a href="#client">Testimonials</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <ul class="footer__links">
          <li>
            <a href="#">
              <span><i class="ri-phone-fill"></i></span> +01 540712
            </a>
          </li>
          <li>
            <a href="#">
              <span><i class="ri-map-pin-fill"></i></span> Kathmandu , Nepal
            </a>
          </li>
          <li>
            <a href="#">
              <span><i class="ri-mail-fill"></i></span> goride@gmail
            </a>
          </li>
        </ul>
      </div>
      <div class="footer__col">
        <div id="map"></div>

      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2024 Go Ride. All rights reserved.
    </div>
  </footer>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <!-- for map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaUDxV6xm68YQJA78kcn-lHXLTSu_KY1M&callback=initMap&libraries=&v=weekly"
    async>
  </script>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>