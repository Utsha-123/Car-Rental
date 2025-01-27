<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
        <a href="{{ route('login')}}">Login </a>
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Rentals & Parts</title>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <!-- Navbar content (assume it will be similar to the Navbar component) -->
  </div>

 

    <!-- About Us Section -->
    <div class="grid p-3 aboutus">
      <div class="flex p-3">
        <div class="about">
          <h3 class="text-3xl font-bold text-white text-center">
            About us
          </h3>
          <p class="text-white">
            Our platform offers a wide range of services, including the
            hassle-free booking of rental vehicles like bikes and cars and the
            convenient purchase of spare parts for any type of vehicle. We
            prioritize customer satisfaction by providing a seamless
            experience for browsing, booking, and purchasing services.
          </p>
        </div>
        <div class="mapouter">
          <h3 class="text-3xl font-bold text-white text-center">
            Visit us
          </h3>
          <br />
          <div class="gmap_canvas">
            <iframe
              width="400"
              height="400"
              id="gmap_canvas"
              src="https://maps.google.com/maps?q=satdobato&t=&z=13&ie=UTF8&iwloc=&output=embed"
              frameborder="0"
              scrolling="no"
              marginheight="0"
              marginwidth="0"
            ></iframe>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
