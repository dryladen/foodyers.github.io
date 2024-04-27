<?php
include('../components/koneksi.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $password = $_POST['password'];
  $konfirmasi_password = $_POST['konfirmasi-password'];
  // Check email
  $checkEmail = "SELECT * FROM users WHERE email = '$email'";
  $result = $koneksi->query($checkEmail);
  if ($result->num_rows > 0) {
    echo "<script>alert('Email sudah digunakan')</script>";
  } else {
    if ($password == $konfirmasi_password) {
      if (empty($_FILES['gambar']['name'])) {
        $gambar = 'user.jpg'; // default image
      } else {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $path = "../images/users/" . $gambar;
      }
      $sql = "INSERT INTO users (username, email, password, role, gambar) VALUES ('$username', '$email', '$password', '$role', '$gambar')";
      if ($koneksi->query($sql) === TRUE) {
        move_uploaded_file($tmp, $path);
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location.replace('../index.php')</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
    } else {
      echo "<script>alert('Password tidak sama')</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../components/head.php')
  ?>
  <title>Data Pengguna</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php'); ?>
      <div class="col-9 p-0">
        <nav class="fixed-top" style="background-color: #47b3fa;z-index: 5;">
          <div class="text-end px-5" style="padding: 15px 0;">
            <span class="nav-link text-white "><img src="../images/user/user.jpg" width="32" class="rounded-circle me-3" alt="">Syahria</span>
          </div>
        </nav>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- start content -->
          <h4 class="fw-bold">Tambah Data</h4>
          <div class="card bg-body-secondary p-4">
            <div class="row container-fluid">
              <div class="card-head col-4 text-center p-3">
                <img id="preview" src="../images/user.jpg" width="200" height="200" class="rounded-circle object-fit-contain" alt="">
              </div>
              <div class="card-body col-8">
                <form class="form" action="backend/add.php" method="post" enctype="multipart/form-data">
                  <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="mb-2">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" id="role" name="role">
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                    </select>
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
                  <button class="btn btn-biru btn-lg w-100" type="submit" name="submit">Tambah</button>
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