<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/head.php') ?>
  <title>Data Users</title>
</head>


<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php') ?>
      <div class="col-9 p-0">
        <nav class="fixed-top" style="background-color: #47b3fa;z-index: 5;">
          <div class="text-end px-5" style="padding: 15px 0;">
            <span class="nav-link text-white "><img src="../images/user.jpg" width="32" class="rounded-circle me-3" alt="">Syahria</span>
          </div>
        </nav>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- start content -->
          <h4 class="fw-bold">Daftar Pengguna</h4>

          <table class="table table-striped table-hover" id="dataTables">
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
              <tr>
                <th class="text-center ">1</th>
                <td class="text-center "><img src="../images/user.jpg" width="32" class="rounded-circle " alt="">
                </td>
                <td class="text-center ">Otto</td>
                <td class="text-center ">otto@gmail.com</td>
                <td class="text-center ">user</td>
                <td class="text-center">
                  <a class="btn bg-success " href="edit.php"><i class="text-white fas fa-pencil"></i></a>
                  <a class="btn bg-danger " href=""><i class="text-white fa fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <th class="text-center ">2</th>
                <td class="text-center "><img src="../images/user.jpg" width="32" class="rounded-circle " alt="">
                </td>
                <td class="text-center ">Rark</td>
                <td class="text-center ">rark@gmail.com</td>
                <td class="text-center ">admin</td>
                <td class="text-center">
                  <a class="btn bg-success " href="edit.php"><i class="text-white fas fa-pencil"></i></a>
                  <a class="btn bg-danger " href=""><i class="text-white fa fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <th class="text-center ">3</th>
                <td class="text-center "><img src="../images/user.jpg" width="32" class="rounded-circle " alt="">
                </td>
                <td class="text-center ">Uto</td>
                <td class="text-center ">uto@gmail.com</td>
                <td class="text-center ">admin</td>
                <td class="text-center">
                  <a class="btn bg-success " href="edit.php"><i class="text-white fas fa-pencil"></i></a>
                  <a class="btn bg-danger " href=""><i class="text-white fa fa-trash"></i></a>
                </td>
              </tr>
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