<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_mahasiswa_smd";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
} 
?>