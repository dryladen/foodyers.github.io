<?php
include('components/koneksi.php');
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);
  $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($koneksi, $query);
  // memasukan data ke dalam session
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['gambar'] = $row['gambar'];
    $_SESSION['role'] = $row['role'];
    header('Location: pages/beranda.php');
  } else {
    echo "<script>alert('Email atau Password salah!')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap-5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <section class="vh-100" style="background-color: #40A2E3;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form action="" method="post">
                <h3 class="mb-4">Masuk Akun</h3>
                <div class="form-outline mb-3">
                  <input type="email" name="email" id="email" class="form-control form-control-md" placeholder="Email" />
                </div>
                <div class="form-outline mb-3">
                  <input type="password" name="password" id="password" class="form-control form-control-md" placeholder="Password" />
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Masuk</button>
              </form>
              <hr class="my-4">
              <p class="mb-0">Belum punya akun? <a href="pages/register.php">Daftar</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="bootstrap-5.3.3/js/bootstrap.min.js"></script>
</body>

</html>