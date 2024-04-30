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
          <!-- start content -->
          <h4 class="fw-bold">Daftar Rumah Makan</h4>
          <table class="table table-striped table-hover" id="dataTables">
            <thead>
              <tr>
                <th colspan="6"></th>
                <th class="text-end"><a class="btn bg-primary text-white" href="add.php"><i class="bi bi-plus-circle me-3"></i>Tambah Data</a></th>
              </tr>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Alamat</th>
                <th>Rating</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Sertakan file koneksi database di sini
              include('../components/koneksi.php');
              // Jalankan query
              $result = mysqli_query($koneksi, "SELECT rumah_makan.*, SUM(rating.rating) AS total_rating FROM rumah_makan LEFT JOIN rating ON rumah_makan.id = rating.id_rumah_makan GROUP BY rumah_makan.id");
              // Tampilkan data setiap baris
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <th class='align-middle text-center'><?= $row['id']; ?></th>
                    <td class='align-middle text-center'><img src='../images/rumah-makan/<?= $row['gambar']; ?>' height='120' class='rounded' alt=''></td>
                    <td class='align-middle text-center'><?= $row['nama']; ?></td>
                    <td class='align-middle text-justify'><?= $row['deskripsi']; ?></td>
                    <td class='align-middle text-justify'><?= $row['alamat']; ?></td>
                    <td class='align-middle text-center'><?= $row['total_rating'] ? $row['total_rating'] : 'Belum di rating'; ?></td>
                    <td class='align-middle text-center'>
                      <div class="mb-3">
                        <a class='btn bg-primary' title="Ubah Data" href='edit.php?id=<?=$row['id']; ?>'><i class='text-white fas fa-pencil'></i></a>
                        <a class='btn bg-danger' title="Hapus Data" href='delete.php?id=<?=$row['id']; ?>'><i class='text-white fa fa-trash'></i></a>
                      </div>
                      <div class="">
                        <a class='btn bg-success' title="Daftar Menu" href="../daftar-menu/index.php?id=<?= $row['id'] ?>"><i class="text-white bi bi-bag-plus"></i></i></a>
                        <a class='btn bg-primary' title="Detail Rumah Makan" href="../pages/detail.php?id=<?= $row['id'] ?>"><i class="text-white bi bi-journal-text"></i></i></a>
                      </div>
                    </td>
                  </tr>
              <?php
                }
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