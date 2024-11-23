<?php
include "../conf/conn.php";

// Menghindari penggunaan mysql_real_escape_string karena ekstensi mysql sudah usang
$username = mysqli_real_escape_string($koneksi, htmlentities($_POST['username']));
$password = mysqli_real_escape_string($koneksi, htmlentities($_POST['password']));
$password = md5($password); // Gunakan fungsi hash yang lebih kuat untuk penyimpanan password

$check = mysqli_query($koneksi, "SELECT * FROM kasir WHERE username = '$username' AND password = '$password'") or die(mysqli_error($koneksi));


if (mysqli_num_rows($check) >= 1) {
  while ($row = mysqli_fetch_array($check)) {
    session_start();
    $_SESSION['id_kasir'] = $row['id_kasir'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['level'] = $row['level'];
    ?>
    <script>
      alert("Selamat Datang <?= $row['level']; ?> Kamu Telah Login Ke Halaman <?= $row['level']; ?>  !!!");
      window.location.href = "../index.php"
    </script>
    <?php
  }
} else {
  echo '<script>alert("Masukan Username dan Password dengan Benar !!!");
window.location.href="login.php"</script>';
}
?>