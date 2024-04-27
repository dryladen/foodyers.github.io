<?php
include('../components/koneksi.php');
// jika tombol submit ditekan
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $diskon = $_POST['diskon'];
  $deskripsi = $_POST['deskripsi'];
  // Jika _files kosong
  if (empty($_FILES['gambar']['name'])) {
    $gambar = ''; // default image
  } else {
    // Jika _files tidak kosong
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../images/rumah-makan/" . $gambar;
  }
  // jika gambar tidak diubah
  if ($gambar == '') {
    $query = "UPDATE rumah_makan SET nama = '$nama', alamat = '$alamat', diskon = '$diskon', deskripsi = '$deskripsi' WHERE id = $id";
    // Menjalankan query
    mysqli_query($koneksi, $query);
  } else {
    // Jika gambar diubah
    $query = "UPDATE rumah_makan SET nama = '$nama', alamat = '$alamat', diskon = '$diskon', deskripsi = '$deskripsi', gambar = '$gambar' WHERE id = $id";
    move_uploaded_file($tmp, '../images/rumah-makan/' . $gambar);
    // Menjalankan query
    mysqli_query($koneksi, $query);
  }
  echo "<script>alert('Data berhasil diubah')</script>";
  echo "<script>window.location.replace('index.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/head.php') ?>
  <title>Data Rumah Makan</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php') ?>
      <div class="col-9 p-0">
        <?php include('../components/navbar.php') ?>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- isi content berubah ubah -->
          <h4 class="fw-bold">Ubah Data</h4>
          <div class="card  bg-body-secondary p-4">
            <div class="">
              <?php
              include('../components/koneksi.php');
              // Get the id from the URL parameter
              $id = $_GET['id'];
              // Prepare the SQL statement
              $sql = "SELECT * FROM rumah_makan WHERE id = $id";

              // Execute the query
              $result = $koneksi->query($sql);

              // Check if the query was successful
              if ($result) {
                // Fetch the data
                $row = $result->fetch_assoc();

                // Close the database connection
                $koneksi->close();

                // Display the data in the form
              ?>
                <form class="form container-fluid d-flex flex-wrap" action="" method="post" enctype="multipart/form-data">
                  <div class="card-head text-center p-3">
                    <img id="preview" src="../images/rumah-makan/<?= $row['gambar'] ?>" width="250" height="250" class="rounded object-fit-contain" alt="">
                    <div class="mt-3 text-start">
                      <label for="formFile" class="form-label">Gambar</label>
                      <input class="form-control" type="file" name="gambar" id="formFile">
                    </div>
                  </div>
                  <div class="card-body ps-3">
                    <div class="mb-2">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Rumah Makan" value="<?php echo $row['nama']; ?>" required>
                    </div>
                    <div class="mb-2">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat']; ?>" required>
                    </div>
                    <div class="mb-2">
                      <label for="diskon" class="form-label">Diskon Untuk Mahasiswa ?</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="diskon" id="iya" value="iya" <?php if ($row['diskon'] == 'iya') echo 'checked'; ?>>
                        <label class="form-check-label" for="iya">Iya</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="diskon" id="tidak" value="tidak" <?php if ($row['diskon'] == 'tidak') echo 'checked'; ?>>
                        <label class="form-check-label" for="tidak">Tidak</label>
                      </div>
                    </div>
                    <div class="mb-5">
                      <label class="form-label" for="deskripsi">Deskripsi</label>
                      <textarea class="form-control" placeholder="Deskripsikan rumah makan" id="deskripsi" name="deskripsi" style="height: 100px" required><?php echo $row['deskripsi']; ?></textarea>
                    </div>
                    <button class="btn btn-biru btn-lg w-100" type="submit" name="submit">Simpan</button>
                  </div>
                </form>
              <?php
              }
              ?>
            </div>
          </div>
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