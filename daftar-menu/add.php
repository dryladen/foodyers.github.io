<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  include('../components/koneksi.php');
  // jika tombol submit ditekan
  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $sql = "INSERT INTO daftar_menu (id_rumah_makan, nama, harga, jenis) VALUES ($id,'$nama', '$harga', '$jenis')";
    if ($koneksi->query($sql) === TRUE) {
      echo "<script>alert('Data berhasil ditambahkan')</script>";
      echo "<script>window.location.replace('index.php?id=$id')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
  }
} else {
  header('Location: ../rumah-makan/index.php');
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
              <form class="form container-fluid d-flex flex-wrap" action="" method="post">
                <div class="card-body ps-3">
                  <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Menu" required>
                  </div>
                  <div class="mb-2">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" min=0 name="harga" class="form-control" id="harga" placeholder="Harga" required>
                  </div>
                  <div class="mb-5">
                    <div class="mb-2">
                      <label for="jenis" class="form-label">Jenis Menu</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="makanan" value="makanan" checked>
                        <label class="form-check-label" for="makanan">Makanan</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="minuman" value="minuman">
                        <label class="form-check-label" for="minuman">Minuman</label>
                      </div>
                    </div>
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