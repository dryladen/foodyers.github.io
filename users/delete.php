<?php
include('../components/koneksi.php');
// jika tombol hapus ditekan
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Dapatkan nama gambar pengguna
  $result = mysqli_query($koneksi, "SELECT gambar FROM users WHERE id=$id");
  $row = mysqli_fetch_assoc($result);
  $gambar = $row['gambar'];
  // Hapus file gambar dari folder jika bukan user.jpg
  if ($gambar != 'user.jpg') {
    unlink("../../images/users/" . $gambar);
  }
  $sql = "DELETE FROM users WHERE id=$id";
  // Jalankan query  
  if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    // Alihkan ke index.php
    echo "<script>window.location.replace('index.php');</script>";
  } else {
    echo "Error : " . mysqli_error($koneksi);
  }
}
