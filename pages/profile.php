<?php
include('../components/koneksi.php');
// Mengambil id dari session
session_start();
$id = $_SESSION['id'];
// Mengambil data dari database
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id = $id");
// Mengubah data menjadi array assosiatif
$user = mysqli_fetch_assoc($result);

// jika tombol submit ditekan
if (isset($_POST['submit'])) {
  // Mengambil data dari form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $password = $_POST['password'];
  $konfirmasi_password = $_POST['konfirmasi-password'];
  // Jika password dan konfirmasi password tidak sama
  if ($password != $konfirmasi_password) {
    echo "<script>alert('Password dan Konfirmasi Password tidak sama')</script>";
  } else {
    // Jika _files kosong
    if (empty($_FILES['gambar']['name'])) {
      $gambar = ''; // default image
    } else {
      // Jika _files tidak kosong
      $gambar = $_FILES['gambar']['name'];
      $tmp = $_FILES['gambar']['tmp_name'];
      $path = "../images/users/" . $gambar;
    }
    // jika gambar tidak diubah
    if ($gambar == '') {
      if ($password == '') {
        // Jika password kosong, tidak ubah password
        $query = "UPDATE users SET username = '$username', email = '$email', role = '$role' WHERE id = $id";
      } else {
        // Jika password tidak kosong, ubah password
        $query = "UPDATE users SET username = '$username', email = '$email', role = '$role', password = '$password' WHERE id = $id";
      }
      // Menjalankan query
      mysqli_query($koneksi, $query);
    } else {
      // Jika gambar diubah
      if ($password == '') {
        // Jika password kosong, tidak ubah password
        $query = "UPDATE users SET username = '$username', email = '$email', role = '$role', gambar = '$gambar' WHERE id = $id";
      } else {
        // Jika password tidak kosong, ubah password
        $query = "UPDATE users SET username = '$username', email = '$email', role = '$role', password = '$password', gambar = '$gambar' WHERE id = $id";
      }
      move_uploaded_file($tmp, '../images/users/' . $gambar);
      // Menjalankan query
      mysqli_query($koneksi, $query);
    }
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<script>window.location.replace('profile.php')</script>";
  }
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
  <title>Profile</title>
</head>

<body>
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
  <div class="container">
    <div class="">
      <div class="px-5 py-3 z-1" style="z-index: 1;">
        <!-- start content -->
        <h4 class="fw-bold">Profile</h4>
        <div class="card bg-body-secondary p-4">
          <div class="row container-fluid">
            <div class="card-head col-4 text-center p-3">
              <img id="preview" src="../images/users/<?= $user['gambar'] ?>" width="200" height="200" class="bg-white rounded-circle  object-fit-contain" alt="">
            </div>
            <div class="card-body col-8">
              <form class="form" action="" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php echo $user['username']; ?>">
                </div>
                <div class="mb-2">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $user['email']; ?>">
                </div>
                <div class="mb-2">
                  <div class="row px-3">
                    <div class="col-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class=" col-6">
                      <label for="konfirmasi-password" class="form-label">Konfirmasi Password</label>
                      <input type="password" class="form-control" id="konfirmasi-password" name="konfirmasi-password" placeholder="Konfirmasi Password">
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <label for="formFile" class="form-label">Gambar</label>
                  <input class="form-control" type="file" name="gambar" id="formFile">
                </div>
                <button class="btn btn-biru btn-lg w-100" type="submit" name="submit">Simpan</button>
              </form>
            </div>
          </div>
        </div>
        <!-- end content -->
      </div>
    </div>
  </div>
  </div>
  <?php include('../components/footer.php') ?>
  <script src="../bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('formFile').addEventListener('change', function(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('preview');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTables').DataTable({
        aaSorting: [],
        "columnDefs": [{
          className: "dt-head-center",
          targets: "_all"
        }],
        "preDrawCallback": function(settings) {
          $('#dataTables tbody').hide();
        },
        "drawCallback": function() {
          $('#dataTables tbody td').addClass("blurry");
          $('#dataTables tbody').fadeIn(200);
          setTimeout(function() {
            $('#dataTables tbody td').removeClass("blurry");
          }, 200);
        }
      });
    });
  </script>
</body>

</html>