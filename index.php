<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap-5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="bootstrap-5.3.3/css/style.css" />
  <title>FoodMahasiswaSMD</title>
</head>

<body class="bg-bg-body-tertiary min-vh-100">
  <nav class="navbar navbar-expand-lg sticky-lg-top py-3" style="background-color: #40A2E3;">
    <div class="container">
      <a class="navbar-brand fw-bold text-white " href="#">FoodMahasiswaSMD</a>
      <button class="navbar-toggler bg-white " type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
        </ul>
      </div>
    </div>
  </nav>
  <div class="container py-3" style="height: 480px;">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="col-8">
        <h1>Selamat Datang Di <span class="fw-bold" style="color: #40A2E3;">Food Mahasiswa Samarinda</span></h1>
        <hr>
        <h4>Temukan Tempat Makan Favoritmu Disini !</h4>
        <p>Food Mahasiswa Samarinda adalah website yang menyediakan informasi tempat makan favorit di Samarinda. Website ini dibuat untuk memudahkan mahasiswa dalam mencari tempat makan yang sesuai dengan selera dan budget mahasiswa.</p>
        <hr>
        <a href="pages/login.php" class="btn btn-biru rounded-4 px-5 fw-bold">Masuk</a>
      </div>
      <div class="col-4">
        <img src="images/rumah-makan/default.png" class="card-img-top rounded-top object-fit-contain" style="height: 250px;" alt="<?= $row['gambar'] ?>" />
      </div>
    </div>
  </div>
  </div>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top fixed-bottom" style="background-color: #40A2E3;">
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
  <script src="bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>