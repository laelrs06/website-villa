<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location:../login/index.php");
    exit(); // Terminate script execution after the redirect
}
//koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_pengunjung= $_GET['id_pengunjung'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pengunjung where id_pengunjung='$id_pengunjung'");
 
// mengalihkan halaman kembali ke dashboard.php
header("location:pengunjung.php");
 
?>