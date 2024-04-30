<?php
include('../components/koneksi.php');
// jika tombol submit ditekan
if(isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $diskon = $_POST['diskon'];
  $deskripsi = $_POST['deskripsi'];
  if (empty($_FILES['gambar']['name'])) {
    $gambar = 'default.png'; // default image
  } else {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../images/rumah-makan/" . $gambar;
  }
  $sql = "INSERT INTO rumah_makan (nama, alamat, diskon, deskripsi, gambar) VALUES ('$nama', '$alamat', '$diskon', '$deskripsi', '$gambar')";
  if ($koneksi->query($sql) === TRUE) {
    move_uploaded_file($tmp, $path);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location.replace('index.php')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/head.php') ?>
  <title>Data Rumah Makan</title>
</head>

<body>F
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php') ?>F
      <div class="col-9 p-0">
        <nav class="fixed-top" style="background-color: #47b3fa;z-index: 5;">
          <div class="text-end px-5" style="padding: 15px 0;">
            <span class="nav-link text-white "><img src="../images/user.jpg" width="32" class="rounded-circle me-3" alt="">Syahria</span>
          </div>
        </nav>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- start content -->
          <h4 class="fw-bold">Tambah Data</h4>
          <div class="card  bg-body-secondary p-4">
            <div class="">
              <form class="form container-fluid d-flex flex-wrap" action="" method="post" enctype="multipart/form-data">
                <div class="card-head text-center p-3">
                  <img id="preview" src="../images/rumah-makan/default.png" width="250" height="250" class="rounded object-fit-contain" alt="">
                  <div class="mt-3 text-start">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" name="gambar" id="formFile">
                  </div>
                </div>
                <div class="card-body ps-3">
                  <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Rumah Makan" required>
                  </div>
                  <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                  </div>
                  <div class="mb-2">
                    <div class="mb-2">
                      <label for="diskon" class="form-label">Diskon Untuk Mahasiswa ?</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="diskon" id="iya" value="iya">
                        <label class="form-check-label" for="iya">Iya</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="diskon" id="tidak" value="tidak" checked>
                        <label class="form-check-label" for="tidak">Tidak</label>
                      </div>
                    </div>
                  </div>
                  <div class="mb-5">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" placeholder="Deskripsikan rumah makan" id="deskripsi" name="deskripsi" style="height: 100px" required></textarea>
                  </div>
                  <button class="btn btn-biru btn-lg w-100" type="submit" name="submit">Tambah</button>
              </form>
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