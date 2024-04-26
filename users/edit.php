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
          <h4 class="fw-bold">Ubah Data</h4>
          <div class="card bg-body-secondary p-4">
            <div class="row container-fluid">
              <div class="card-head col-4 text-center p-3">
                <img src="../../images/user.jpg" class="rounded-circle" alt="">
              </div>
              <div class="card-body col-8">
                <form class="form-" action="" method="post">
                  <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" value="Syahria">
                  </div>
                  <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" value="syahria@gmail.com">
                  </div>
                  <div class="mb-2">
                    <div class="row px-3">
                      <div class="col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                      </div>
                      <div class=" col-6">
                        <label for="konfirmasi-password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirmasi-password" placeholder="Konfirmasi Password">
                      </div>
                    </div>
                  </div>
                  <div class="mb-5">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                  <!-- <button class="btn btn-primary btn-lg w-100" type="submit">Masuk</button> -->
                  <a class="btn btn-biru btn-lg w-100" href="../index.html">Simpan</a>
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