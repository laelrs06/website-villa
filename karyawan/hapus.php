<?php


// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_karyawan = $_GET['id_karyawan'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from karyawan where id_karyawan='$id_karyawan'");
 
// mengalihkan halaman kembali ke index.php
header("location:karyawan.php");
 
?>