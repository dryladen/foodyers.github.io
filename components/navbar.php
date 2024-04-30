<?php
include('../components/koneksi.php');
// Mengambil id dari session
$id = $_SESSION['id'];
// Mengambil data dari database
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id = $id");
// Mengubah data menjadi array assosiatif
$user = mysqli_fetch_assoc($result);
if ($user['role'] !== 'admin') {
  header('Location: ../index.php');
}
?>
<nav class="fixed-top" style="background-color: #47b3fa;z-index: 5;">
  <div class="text-end px-5" style="padding: 15px 0;">
    <span class="nav-link text-white "><img src="../images/users/<?= $user['gambar'] ?>" width="32" height="32" class="rounded-circle border-white border-2  me-3 object-fit-cover" alt=""><?= $user['username'] ?></span>
  </div>
</nav>