<?php
if (isset($_GET['id'])) {
  include('../components/koneksi.php');
  $id = $_GET['id'];
  $query = "SELECT * FROM rumah_makan WHERE id = $id";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($result);
} else {
  header('Location: ../rumah-makan/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/head.php') ?>
  <title>Daftar Menu</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php') ?>
      <div class="col-9 p-0">
        <?php include('../components/navbar.php') ?>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- start content -->
          <h4 class="fw-bold">Daftar Menu</h4>
          <h3 class="fw-bold"><?= $data['nama']; ?></h3>
          <table class="table table-striped table-hover" id="dataTables">
            <thead>
              <tr>
                <th colspan="4"></th>
                <th class="text-end"><a class="btn bg-primary text-white" href="add.php?id=<?= $data['id'] ?>"><i class="bi bi-plus-circle me-3"></i>Tambah Data</a></th>
              </tr>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jenis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Sertakan file koneksi database di sini
              include('../components/koneksi.php');
              // Jalankan query
              $result = mysqli_query($koneksi, "SELECT * from daftar_menu WHERE id_rumah_makan = $data[id]");
              // Tampilkan data setiap baris
              $no = 1;
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <th class='align-middle text-center'><?= $no ?></th>
                    <td class='align-middle text-center'><?= $row['nama']; ?></td>
                    <td class='align-middle text-center'><?= $row['harga']; ?></td>
                    <td class='align-middle text-center'><?= $row['jenis']; ?></td>
                    <td class='align-middle text-center'>
                      <a class='btn bg-danger' title="Hapus Data" href='delete.php?id=<?= $row['id']; ?>&id_rumah_makan=<?= $data['id'] ?>'><i class='text-white fa fa-trash'></i></a>
                    </td>
                  </tr>
              <?php
                $no++;}
              }
              ?>
            </tbody>
          </table>
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