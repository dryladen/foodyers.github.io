<!DOCTYPE html>
<html lang="en">
<?php include('../components/head.php') ?>

<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
      <?php include('../components/sidebar.php') ?>
      <div class="col-9 p-0">
        <?php include('../components/navbar.php') ?>
        <div id="content" class="px-5 py-3 z-1" style="z-index: 1;">
          <!-- start content -->
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