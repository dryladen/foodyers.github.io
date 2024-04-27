<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/koneksi.php') ?>
  <?php include('../components/head.php') ?>
  <title>Data Pengguna</title>
</head>


<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php') ?>
      <div class="col-9 p-0">
        <?php include('../components/navbar.php') ?>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- start content -->
          <h4 class="fw-bold">Daftar Pengguna</h4>

          <table class="table align-middle table-striped table-hover" id="dataTables">
            <thead>
              <tr>
                <th colspan="5"></th>
                <th class="text-end"><a class="btn bg-primary text-white" href="add.php"><i class="bi bi-plus-circle me-3"></i>Tambah Data</a></th>
              </tr>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $result = mysqli_query($koneksi, "SELECT * FROM users");
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr class="align-middle">
                  <th class="text-center "><?= $no ?></th>
                  <td class="text-center "><img src="../images/users/<?= $row['gambar'] ?>" width="64" height="64" class="object-fit-contain rounded-circle " alt="">
                  </td>
                  <td class="text-center align-middle"><?= $row['username'] ?></td>
                  <td class="text-center align-middle "><?= $row['email'] ?></td>
                  <td class="text-center align-middle "><?= $row['role'] ?></td>
                  <td class="text-center align-middle">
                    <a class="btn bg-success " href="edit.php?id=<?= $row['id'] ?>"><i class="text-white fas fa-pencil"></i></a>
                    <a class="btn bg-danger " href="backend/delete.php?id=<?= $row['id'] ?>"><i class="text-white fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php $no++;
              } ?>
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