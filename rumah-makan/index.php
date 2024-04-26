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
              <tr>
                <th class="text-center ">1</th>
                <td class="text-center "><img src="../images/bakoel.jpg" height="120" class="rounded " alt="">
                </td>
                <td class="text-center ">Bakoel</td>
                <td class="text-justify ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae quas id
                  dolore distinctio error provident inventore, fugit officia sequi earum illo laudantium facere dolorum
                  debitis perferendis esse eligendi recusandae iste?</td>
                <td class="text-justify ">Jl. A. Yani No. 1, Banjarmasin</td>
                <td class="text-center ">4.7</td>
                <td class="text-center">
                  <a class="btn bg-success " href="edit.php"><i class="text-white fas fa-pencil"></i></a>
                  <a class="btn bg-danger " href=""><i class="text-white fa fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <th class="text-center ">2</th>
                <td class="text-center "><img src="../images/rm_borneo.jpg" height="120" class="rounded " alt="">
                </td>
                <td class="text-center ">Bakoel</td>
                <td class="text-justify ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae quas id
                  dolore distinctio error provident inventore, fugit officia sequi earum illo laudantium facere dolorum
                  debitis perferendis esse eligendi recusandae iste?</td>
                <td class="text-justify ">Jl. A. Yani No. 1, Banjarmasin</td>
                <td class="text-center ">4.7</td>
                <td class="text-center">
                  <a class="btn bg-success " href="edit.php"><i class="text-white fas fa-pencil"></i></a>
                  <a class="btn bg-danger " href=""><i class="text-white fa fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <th class="text-center ">3</th>
                <td class="text-center "><img src="../images/ayam-goreng-banjar.jpg" height="120" class="rounded " alt="">
                </td>
                <td class="text-center ">Bakoel</td>
                <td class="text-justify ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae quas id
                  dolore distinctio error provident inventore, fugit officia sequi earum illo laudantium facere dolorum
                  debitis perferendis esse eligendi recusandae iste?</td>
                <td class="text-justify ">Jl. A. Yani No. 1, Banjarmasin</td>
                <td class="text-center ">4.7</td>
                <td class="text-center" style="width: 85px;">
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