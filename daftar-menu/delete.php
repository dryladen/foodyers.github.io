<?php
// jika belum login
session_start();
if (!$_SESSION['role']) {
  header('Location: ../index.php');
}


include('../components/koneksi.php');
// jika tombol hapus ditekan
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $id_rumah_makan = $_GET['id_rumah_makan'];
  $sql = "DELETE FROM daftar_menu WHERE id=$id";
  // Jalankan query  
  if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    // Alihkan ke index.php
    echo "<script>window.location.replace('index.php?id=$id_rumah_makan');</script>";
  } else {
    echo "Error : " . mysqli_error($koneksi);
  }
}
