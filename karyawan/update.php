<?php 
// koneksi database
include '../koneksi.php';
session_start();

// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id_karyawan'];
$username = $_POST['username'];
$password= $_POST['password'];
$email = $_POST['email'];


// update data ke database
mysqli_query($koneksi,"update karyawan set username='$username', password='$password', email='$email' where id_karyawan='$id'");

// mengalihkan halaman kembali ke index.php
header("location:karyawan.php");
 
?>