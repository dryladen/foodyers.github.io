<?php include('../components/koneksi.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $konfirmasi_password = $_POST['konfirmasi-password'];
  // Check email
  $cekEmail = "SELECT * FROM users WHERE email = '$email'";
  $result = $koneksi->query($cekEmail);
  if ($result->num_rows > 0) {
    echo "<script>alert('Email sudah digunakan')</script>";
  } else {
    if ($password == $konfirmasi_password) {
      $password = md5($password);
      $sql = "INSERT INTO users (username, email, password, role, gambar) VALUES ('$username', '$email', '$password', 'user', 'user.jpg')";
      if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location.replace('../index.php')</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
    } else {
      echo "<script>alert('Password tidak sama')</script>";
    }
  }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <title>Register</title>
</head>

<body>
  <section class="vh-100" style="background-color: #40A2E3;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form action="" method="post">
                <h3 class="mb-4">Daftar Akun</h3>
                <div class="form-outline mb-3">
                  <input type="text" name="username" id="username" class="form-control form-control-md" required placeholder="Username" />
                </div>
                <div class="form-outline mb-3">
                  <input type="email" name="email" id="email" class="form-control form-control-md" required placeholder="Email" />
                </div>
                <div class="form-outline mb-3">
                  <input type="password" name="password" id="password" class="form-control form-control-md" required placeholder="Password" />
                </div>
                <div class="form-outline mb-3">
                  <input type="password" name="konfirmasi-password" id="konfirmasi-password" class="form-control form-control-md" required placeholder="Konfirmasi Password" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg w-100">Daftar</button>
              </form>
              <hr class="my-4">
              <p class="mb-0">Sudah punya akun? <a href="../index.php">Masuk</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>