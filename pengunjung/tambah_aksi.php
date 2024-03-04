<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit(); // Terminate script execution after the redirect
}
?>

<?php 
// koneksi database
include '../koneksi.php';
 
if (isset($_POST['submit'])) {
	// menangkap data yang di kirim dari form
	$id_pengunjung = $_POST['id_pengunjung'];
	$nama_pengunjung = $_POST['nama_pengunjung'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$no_villa= $_POST['no_villa'];
	$username =$_SESSION['username'];


	$result = mysqli_query($koneksi,"SELECT id_karyawan FROM karyawan WHERE username = '$username'");
	$user = [];

	while ($d = mysqli_fetch_assoc($result)) {
		$user[] = $d;
	}

	$user_id = $user[0]['id_karyawan'];

	// menginput data ke database
	mysqli_query($koneksi,"insert into pengunjung values('$id_pengunjung','$nama_pengunjung','$no_hp','$alamat','$no_villa','$user_id')");
}
 
// mengalihkan halaman kembali ke index.php
header("location:pengunjung.php");
 
?>