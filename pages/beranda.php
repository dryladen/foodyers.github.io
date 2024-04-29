<?php session_start();
if (!$_SESSION['role']) {
  header('Location: ../index.php');
}
?>
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
          <?php if ($_SESSION['role'] == 'admin') { ?>
            <li class="nav-item">
              <a class="nav-link text-white " aria-current="page" href="../rumah-makan/index.php">Manajemen Data</a>
            </li>
          <?php } ?>
        </ul>
        <div class="dropdown">
          <button class="btn btn-biru dropdown-toggle text-white border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../images/users/<?= $_SESSION['gambar'] ?>" width="32" class="rounded-circle me-3" alt="<?= $_SESSION['gambar'] ?>"><?= $_SESSION['username'] ?>
          </button>
          <ul class="dropdown-menu" style="z-index: 99;">
            <li><a class="dropdown-item" href="../pages/profile.php"><i class="bi bi-person-fill pe-3"></i>Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left pe-3"></i>Keluar</a>
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
        <?php
        // Sertakan file koneksi database di sini
        include('../components/koneksi.php');
        // Jalankan query
        $result = mysqli_query($koneksi, "SELECT rumah_makan.*, SUM(rating.rating) AS total_rating FROM rumah_makan LEFT JOIN rating ON rumah_makan.id = rating.id_rumah_makan GROUP BY rumah_makan.id ORDER BY total_rating DESC LIMIT 3");
        // Tampilkan data setiap baris
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card" style="width: 263px">
              <img src="../images/rumah-makan/<?= $row['gambar'] ?>" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="<?= $row['gambar'] ?>" />
              <div class="card-body">
                <h5 class="card-title"><?= $row['nama'] ?></h5>
                <span class="card-text d-flex align-items-center mb-1">
                  <i class="bi bi-geo-alt-fill"></i>
                  <?= $row['alamat'] ?>
                </span>
                <span class="card-text d-flex mb-3 align-items-center">
                  <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
                  <span><?= $row['total_rating'] ? $row['total_rating'] : "0" ?></span>
                </span>
                <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-secondary">
                  <i class="bi bi-box-arrow-in-up-right"></i>
                  Selengkapnya
                </a>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
    <div>
      <h3 class="">Berbagai Rumah Makan Murah Ada Disini !</h3>
      <hr>
      <div class="mb-3 ">
        <form class="d-flex gap-2" role="search" method="get">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" name='cari' placeholder="Cari Rumah Makan" />
          </div>
          <button class="btn text-white fw-medium " style="width: 80px;background-color: #40A2E3;" type="submit">
            Cari
          </button>
        </form>
      </div>
      <div class="d-flex flex-wrap gap-3">
        <?php
        // Sertakan file koneksi database di sini
        include('../components/koneksi.php');
        // Jalankan query
        if (isset($_GET['cari']) && !empty($_GET['cari'])) {
          $search = $_GET['cari'];
          $result = mysqli_query($koneksi, "SELECT rumah_makan.*, SUM(rating.rating) AS total_rating FROM rumah_makan LEFT JOIN rating ON rumah_makan.id = rating.id_rumah_makan WHERE rumah_makan.nama LIKE '%$search%' GROUP BY rumah_makan.id");
        } else {
          $result = mysqli_query($koneksi, "SELECT rumah_makan.*, SUM(rating.rating) AS total_rating FROM rumah_makan LEFT JOIN rating ON rumah_makan.id = rating.id_rumah_makan GROUP BY rumah_makan.id");
        }
        // Tampilkan data setiap baris
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card" style="width: 263px">
              <img src="../images/rumah-makan/<?= $row['gambar'] ?>" class="card-img-top rounded-top object-fit-cover" style="height: 150px;" alt="<?= $row['gambar'] ?>" />
              <div class="card-body">
                <h5 class="card-title"><?= $row['nama'] ?></h5>
                <span class="card-text d-flex align-items-center mb-1">
                  <i class="bi bi-geo-alt-fill"></i>
                  <?= $row['alamat'] ?>
                </span>
                <span class="card-text d-flex mb-3 align-items-center">
                  <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
                  <span><?= $row['total_rating'] ? $row['total_rating'] : "0" ?></span>
                </span>
                <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-secondary">
                  <i class="bi bi-box-arrow-in-up-right"></i>
                  Selengkapnya
                </a>
              </div>
            </div>
        <?php
          }
        }
        ?>
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