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
              <form class="form container-fluid d-flex flex-wrap" action="" method="post">
                <div class="card-head text-center p-3">
                  <img src="../../images/bakoel.jpg" width="350px" class="rounded" alt="">
                  <div class="mt-3 text-start">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                <div class="card-body ps-3">
                  <div class="mb-2">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="username" placeholder="Nama Rumah Makan" value="Bakoel Bamboe">
                  </div>
                  <div class="mb-2">
                    <label for="username" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="username" placeholder="Alamat" value="Jl. A. Yani No. 1, Banjarmasin">
                  </div>
                  <div class="mb-2">
                    <label for="username" class="form-label">Diskon Untuk Mahasiswa ?</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">Iya
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Tidak
                      </label>
                    </div>
                  </div>
                  <div class="mb-5">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" placeholder="Deskripsikan rumah makan" id="deskripsi" style="height: 100px">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique enim suscipit ipsa ea, accusamus, dolorem, veniam fuga architecto quibusdam minus delectus odio quia voluptatibus rem accusantium assumenda doloribus veritatis? Incidunt?</textarea>
                  </div>
                  <!-- <button class="btn btn-primary btn-lg w-100" type="submit">Masuk</button> -->
                  <a class="btn btn-biru btn-lg w-100" href="index.html">Simpan</a>
              </form>
            </div>
          </div>
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