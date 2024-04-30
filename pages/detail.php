<?php session_start();
include('../components/koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT rumah_makan.*, SUM(rating.rating) AS total_rating FROM rumah_makan LEFT JOIN rating ON rumah_makan.id = rating.id_rumah_makan WHERE rumah_makan.id = $id GROUP BY rumah_makan.id");
$rumahMakan = mysqli_fetch_assoc($result);

if (isset($_POST['rating'])) {
  $rating = $_POST['rating'];
  $ulasan = $_POST['ulasan'];
  $id_rumah_makan = $_POST['id_rumah_makan'];
  $id_user = $_SESSION['id'];
  $query = "INSERT INTO rating (id_rumah_makan, id_user, rating, ulasan) VALUES ($id_rumah_makan, $id_user, $rating, '$ulasan')";
  mysqli_query($koneksi, $query);
  echo "<script>alert('Ulasan berhasil dikirim')</script>";
  echo "<script>window.location.replace('detail.php?id=$id_rumah_makan')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FoodMahasiswaSMD</title>
  <link rel="stylesheet" href="../bootstrap-5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

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
            <a class="nav-link active text-white " aria-current="page" href="beranda.php">Beranda</a>
          </li>
          <?php if ($_SESSION['role'] == 'admin') { ?>
            <li class="nav-item">
              <a class="nav-link text-white " aria-current="page" href="../rumah-makan/index.php">Manajemen Data</a>
            </li>
          <?php } ?>
        </ul>
        <div class="dropdown">
          <button class="btn btn-biru dropdown-toggle text-white border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../images/users/<?= $_SESSION['gambar'] ?>" width="32" class="rounded-circle me-3" alt=""><?= $_SESSION['username'] ?>
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
  <div class="container pb-5 mt-3  w-100">
    <div class="mb-5">
      <div class="mb-3 ">
        <div class="card w-100 ">
          <div class="row">
            <div class="col-4 p-5">
              <img src="../images/rumah-makan/<?= $rumahMakan['gambar'] ?>" class="object-fit-cover w-100 rounded " alt="<?= $rumahMakan['gambar'] ?>" />
            </div>
            <div class="col-6 p-4">
              <div class="card-body">
                <h6>Rumah Makan</h6>
                <h3 class="card-title"><?= $rumahMakan['nama'] ?></h3>
                <hr>
                <h5>Deskripsi</h5>
                <span style="text-align: justify;"><?= $rumahMakan['deskripsi'] ?></span>
                <hr>
                <span class="card-text d-flex align-items-center mb-1">
                  <i class="bi bi-geo-alt-fill"></i>
                  <?= $rumahMakan['alamat'] ?>
                </span>
                <span class="card-text d-flex mb-3 align-items-center">
                  Total Rating :
                  <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
                  <span><?= $rumahMakan['total_rating'] ? $rumahMakan['total_rating'] : '0' ?></span>
                </span>
                <!-- tampilkan jika ada diskon -->
                <?php if ($rumahMakan['diskon'] == 'iya') { ?>
                  <hr>
                  <span class="badge bg-danger p-2">Ada diskon Khusus Mahasiswa</span>
                <?php } ?>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="card p-4">
        <h4>Daftar Menu</h4>
        <div class="row">
          <div class="col-6 mb-2">
            <h6>Makanan</h6>
            <ul class="list-group">
              <?php
              $daftarMenu = mysqli_query($koneksi, "SELECT * FROM daftar_menu WHERE id_rumah_makan = $id AND jenis = 'makanan'");
              while ($menu = mysqli_fetch_assoc($daftarMenu)) {
              ?>
                <li class="list-group-item d-flex align-items-center">
                  <h5 class="me-2 bg-success p-1 rounded m-0"><i class="text-white bi bi-basket"></i></h5> <?= 'Rp.' . $menu['harga'] . ' - ' . $menu['nama'] ?>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="col-6 mb-2">
            <h6>Minuman</h6>
            <ul class="list-group">
              <?php
              $daftarMenu = mysqli_query($koneksi, "SELECT * FROM daftar_menu WHERE id_rumah_makan = $id AND jenis = 'minuman'");
              while ($menu = mysqli_fetch_assoc($daftarMenu)) {
              ?>
                <li class="list-group-item d-flex align-items-center">
                  <h5 class="me-2 bg-primary p-1 rounded m-0"><i class="text-white bi bi-cup-straw"></i></h5> <?= 'Rp.' . $menu['harga'] . ' - ' . $menu['nama'] ?>
                </li>

              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-5">
      <h3>Rating dan Ulasan</h3>
      <hr>
      <?php
      // Dapatkan rating untuk rumah makan
      $ratings = mysqli_query($koneksi, "SELECT rating.*, users.username FROM rating LEFT JOIN users ON rating.id_user = users.id WHERE rating.id_rumah_makan = $id");
      if (mysqli_num_rows($ratings) > 0) {
        while ($rating = mysqli_fetch_assoc($ratings)) {
      ?>
          <div class="">
            <div class="d-flex align-items-center column-gap-1">
              <img src="../images/user.jpg" width="32" class="rounded-circle " alt="">
              <span class="fw-medium"><?= $rating['username'] ?></span>
            </div>
            <div class="d-flex align-items-center column-gap-1">
              <?php
              // iterasi jumlah bintangnya
              for ($i = 1; $i <= $rating['rating']; $i++) {
              ?>
                <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
              <?php
              }
              ?>
              <span class=""><?= date('d/m/Y', strtotime($rating['created_at'])) ?></span>
            </div>
            <p><?= $rating['ulasan'] ?></p>
          </div>
      <?php
        }
      } else {
        echo "<h6>Belum ada ulasan</h6>";
      }
      ?>
    </div>
    <?php
    // Cek apakah user sudah memberikan rating, jika sudah tidak ditampilkan
    $hasRated = mysqli_query($koneksi, "SELECT * FROM rating WHERE id_user = {$_SESSION['id']} AND id_rumah_makan = $id");
    if (mysqli_num_rows($hasRated) == 0) {
    ?>
      <hr>
      <h4>Berikan Ulasan</h4>
      <div class="mb-3 card p-3">
        <div class="d-flex align-items-center column-gap-1">
          <img src="../images/user.jpg" width="32" class="rounded-circle " alt="">
          <span class="fw-medium"><?= $_SESSION['username'] ?></span>
        </div>
        <hr>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <i class="bi bi-star-fill me-1" style="color: #eef139;"></i>
            <select class="form-select" name="rating" id="rating" required>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="ulasan" class="form-label">Ulasan</label>
            <textarea class="form-control" name="ulasan" id="ulasan" rows="3" required></textarea>
          </div>
          <input type="hidden" name="id_rumah_makan" value="<?= $rumahMakan['id'] ?>">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    <?php
    }
    ?>
  </div>
  <footer class="d-flex flex-wrap fixed-bottom justify-content-between align-items-center py-3 border-top" style="background-color: #40A2E3;">
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