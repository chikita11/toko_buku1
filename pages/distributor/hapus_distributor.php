<?php
include "../../conf/conn.php";
$id = $_GET['id'];

// Hapus referensi di tabel 'pasok' terlebih dahulu
$query_pasok = "DELETE FROM pasok WHERE id_distributor = '$id'";
if ($koneksi->query($query_pasok)) {
    // Jika berhasil menghapus dari tabel 'pasok', lanjutkan menghapus dari tabel 'distributor'
    $query_distributor = "DELETE FROM distributor WHERE id_distributor = '$id'";
    if ($koneksi->query($query_distributor)) {
        // Tampilkan pesan sukses dan redirect ke halaman data distributor
        echo '<script>
            alert("Data Berhasil Dihapus !!!");
            window.location.href="../../index.php?page=data_distributor";
        </script>';
    } else {
        // Tampilkan pesan error jika gagal menghapus data dari tabel 'distributor'
        echo '<script>
            alert("Data Gagal Dihapus dari tabel \'distributor\' !!!");
            window.location.href="../../index.php?page=data_distributor";
        </script>';
    }
} else {
    // Tampilkan pesan error jika gagal menghapus data dari tabel 'pasok'
    echo '<script>
        alert("Data Gagal Dihapus dari tabel \'pasok\' !!!");
        window.location.href="../../index.php?page=data_distributor";
    </script>';
}
?>