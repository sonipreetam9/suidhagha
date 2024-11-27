<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Over Carousel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Navbar styling */
    .navbar {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 10;
      background: transparent;
    }
    .navbar .nav-link {
      color: white !important;
      font-weight: 500;
    }
    .navbar .form-control {
      border-radius: 20px;
      max-width: 300px;
    }
    .navbar-brand img {
      height: 50px;
    }

    /* Carousel image styling */
    .carousel-item img {
      height: 100vh; /* Full screen height */
      object-fit: cover;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-white">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand" href="#"><img src="https://via.placeholder.com/150x50?text=Logo" alt="Logo"></a>

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#">NEW</a></li>
          <li class="nav-item"><a class="nav-link" href="#">SUIT SETS</a></li>
          <li class="nav-item"><a class="nav-link" href="#">KURTAS & TOPS</a></li>
          <li class="nav-item"><a class="nav-link" href="#">DRESSES</a></li>
          <li class="nav-item"><a class="nav-link" href="#">FOOTWEAR</a></li>
          <li class="nav-item"><a class="nav-link" href="#">JEWELLERY</a></li>
          <li class="nav-item"><a class="nav-link text-danger" href="#">SALE</a></li>
        </ul>
        <!-- Search -->
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
        </form>
      </div>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div style="height: 1200px;background-color:aqua;">
    <h2 class="text-center">Hello</h2>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
