<?php
$servername = "localhost";  // Nama host database (biasanya 'localhost' untuk XAMPP)
$username = "root";         // Username MySQL (biasanya 'root' di XAMPP)
$password = "";             // Password MySQL (kosongkan untuk XAMPP)
$dbname = "toko_buku";      // Nama database yang digunakan

// Membuat koneksi ke database
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>