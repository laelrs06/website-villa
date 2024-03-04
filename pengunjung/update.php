<?php 
// koneksi database
session_start();
 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id_pengunjung = $_POST['id_pengunjung'];
$nama_pengunjung = $_POST['nama_pengunjung'];
$no_hp= $_POST['no_hp'];
$alamat = $_POST['alamat'];
$no_villa = $_POST['no_villa'];

// update data ke database
mysqli_query($koneksi,"update pengunjung set nama_pengunjung='$nama_pengunjung', no_hp='$no_hp', alamat='$alamat', no_villa='$no_villa' where id_pengunjung='$id_pengunjung'");

// mengalihkan halaman kembali ke index.php
header("location:../pengunjung/pengunjung.php");
 
?>