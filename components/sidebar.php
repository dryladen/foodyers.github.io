<?php
// jika belum login
session_start();
if (!$_SESSION['role']) {
  header('Location: ../index.php');
}
?>
<div class="col-3 p-0 fixed-top min-vh-100" style="background-color: #47b3fa; z-index: 6;">
  <h3 class="text-white fw-bold text-center bg-biru m-0" style="padding: 18px 0;">FoodMahasiswaSMD</h3>
  <ul class="list-sidebar fs-4 mt-3 fw-bold" style="background-color: #47b3fa;">
    <li class="list-sidebar-item rounded-0 active" aria-current="true">
      <a href="../pages/beranda.php"><i class="bi bi-house-fill pe-4"></i></i>Beranda</a>
    </li>
    <li class="list-sidebar-item rounded-0">
      <a href="../rumah-makan/index.php"><i class="bi bi-database-fill pe-4"></i>Data Rumah Makan</a>
    </li>
    <li class="list-sidebar-item rounded-0">
      <a href="../users/index.php"><i class="bi bi-people-fill pe-4"></i>Data Pengguna</a>
    </li>
    <li class="list-sidebar-item rounded-0">
      <a href="../pages/profile.php"><i class="bi bi-person-fill pe-4"></i>Profile</a>
    </li>
    <li class="list-sidebar-item rounded-0">
      <a href="../pages/logout.php"><i class="bi bi-box-arrow-left pe-4"></i>Keluar</a>
    </li>
  </ul>
</div>