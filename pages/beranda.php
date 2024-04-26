<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../bootstrap-5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="../bootstrap-5.3.3/css/style.css" />
  <title>FoodMahasiswaSMD</title>
</head>

<body class="bg-body-tertiary ">
  <nav class="navbar navbar-expand-lg sticky-lg-top py-3" style="background-color: #40A2E3;">
    <div class="container">
      <a class="navbar-brand fw-bold text-white " href="#">FoodMahasiswaSMD</a>
      <button class="navbar-toggler bg-white " type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
          <li class="nav-item">
            <a class="nav-link active text-white " aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " aria-current="page" href="#">Tentang</a>
          </li>
        </ul>
        <div class="dropdown">
          <button class="btn btn-biru dropdown-toggle text-white border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../images/user.jpg" width="32" class="rounded-circle me-3" alt="">Syahria
          </button>
          <ul class="dropdown-menu" style="z-index: 99;">
            <li><a class="dropdown-item" href="/pages/profile.html"><i class="bi bi-person-fill pe-3"></i>Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/pages/login.html"><i class="bi bi-box-arrow-left pe-3"></i>Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container py-3 w-100">
    <div class="mb-3">
      <h3>Rumah Makan Direkomendasi <i class="bi bi-star-fill" style="color: #eef139;"></i></h3>
      <hr>
      <div class="d-flex flex-wrap gap-3">
        <div class="card" style="max-width: 263px">
          <img src="../images/bakoel.jpg" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="../images/rm_borneo.jpg" />
          <div class="card-body">
            <h5 class="card-title">Bakoel Bambu</h5>
            <span class="card-text d-flex align-items-center mb-1">
              <i class="bi bi-geo-alt-fill"></i>
              Jl. A. Yani No. 1, Banjarmasin
            </span>
            <span class="card-text d-flex mb-3 align-items-center">
              <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
              <span>4.7</span>
            </span>
            <a href="pages/detail.html" class="btn btn-secondary">
              <i class="bi bi-box-arrow-in-up-right"></i>
              Selengkapnya
            </a>
          </div>
        </div>
        <div class="card" style="max-width: 263px">
          <img src="../images/rm_borneo.jpg" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="images/.jpg" />
          <div class="card-body">
            <h5 class="card-title">
              Rumah Makan Borneo
            </h5>
            <span class="card-text d-flex align-items-center mb-1">
              <i class="bi bi-geo-alt-fill"></i>
              Jl. A. Yani No. 1, Banjarmasin
            </span>
            <span class="card-text d-flex mb-3 align-items-center">
              <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
              <span>4.9</span>
            </span>
            <a href="pages/detail.html" class="btn btn-secondary">
              <i class="bi bi-box-arrow-in-up-right"></i>
              Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
    <div>
      <h3 class="">Berbagai Rumah Makan Murah Ada Disini !</h3>
      <hr>
      <div class="mb-3 ">
        <form class="d-flex gap-2" role="search">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Cari Rumah Makan" />
          </div>
          <button class="btn text-white fw-medium " style="width: 80px;background-color: #40A2E3;" type="submit">
            Cari
          </button>
        </form>
      </div>
      <div class="d-flex flex-wrap gap-3">
        <div class="card" style="max-width: 263px">
          <img src="../images/bakoel.jpg" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="../images/rm_borneo.jpg" />
          <div class="card-body">
            <h5 class="card-title">Bakoel Bambu</h5>
            <span class="card-text d-flex align-items-center mb-1">
              <i class="bi bi-geo-alt-fill"></i>
              Jl. A. Yani No. 1, Banjarmasin
            </span>
            <span class="card-text d-flex mb-3 align-items-center">
              <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
              <span>4.7</span>
            </span>
            <a href="pages/detail.html" class="btn btn-secondary">
              <i class="bi bi-box-arrow-in-up-right"></i>
              Selengkapnya
            </a>
          </div>
        </div>
        <div class="card" style="max-width: 263px">
          <img src="../images/rm_borneo.jpg" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="../images/.jpg" />
          <div class="card-body">
            <h5 class="card-title">
              Rumah Makan Borneo
            </h5>
            <span class="card-text d-flex align-items-center mb-1">
              <i class="bi bi-geo-alt-fill"></i>
              Jl. A. Yani No. 1, Banjarmasin
            </span>
            <span class="card-text d-flex mb-3 align-items-center">
              <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
              <span>4.9</span>
            </span>
            <a href="pages/detail.html" class="btn btn-secondary">
              <i class="bi bi-box-arrow-in-up-right"></i>
              Selengkapnya
            </a>
          </div>
        </div>
        <div class="card" style="max-width: 263px">
          <img src="../images/ayam-goreng-banjar.jpg" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="../images/.jpg" />
          <div class="card-body">
            <h5 class="card-title">Ayam Goreng Banjar</h5>
            <span class="card-text d-flex align-items-center mb-1">
              <i class="bi bi-geo-alt-fill"></i>
              Jl. A. Yani No. 1, Banjarmasin
            </span>
            <span class="card-text d-flex mb-3 align-items-center">
              <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
              <span>4.2</span>
            </span>
            <a href="pages/detail.html" class="btn btn-secondary">
              <i class="bi bi-box-arrow-in-up-right"></i>
              Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top" style="background-color: #40A2E3;">
    <div class="col-md-4 d-flex align-items-center ps-5 ">
      <span class="mb-3 mb-md-0 text-white ">© Syahria - 2024</span>
    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex me-5 ">
      <li class="ms-3">
        <a class="text-white " href="#"><i class="bi bi-instagram"></i></a>
      </li>
      <li class="ms-3">
        <a class="text-white " href="#"><i class="bi bi-facebook"></i></a>
      </li>
    </ul>
  </footer>
  <script src="../bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>