<?php
session_start();
 
// Terminate script execution after the redirect
?><!DOCTYPE html>
<html>
<head>
	<title>villaest</title>
	<link rel="stylesheet" type="text/css" href="../../toko_bunda/css/style3.css">
</head>
<body>

	<div class="kotak_login">
		<p class="tulisan_login">Tambahkan Data Pengunjung</p>
 
		<form method="POST" action="tambah_aksi.php">

			<label>ID PENGUNJUNG</label>
			<input type="number" name="id_pengunjung" class="form_login" placeholder="masukkan id pengunjung">

			<label>NAMA PENGUNJUNG</label>
			<input type="text" name="nama_pengunjung" class="form_login" placeholder="masukkan nama anda">
 
 			<label>NO HP</label>
			<input type="number" name="no_hp" class="form_login" placeholder="masukkan nomor hp">

			<label>ALAMAT</label>
			<input type="text" name="alamat" class="form_login" placeholder="masukkan alamat">

			<label>NO VILLA</label>
			<input type="number" name="no_villa" class="form_login" placeholder="masukkan nomor villa">

			<input type="submit" name="submit" class="tombol_login" value="SIMPAN">
 
			<br/>
			<br/>
			<center>
				<a class="link" href="../dashboard.php">KEMBALI</a>
			</center>
		</form>
	</div>
</center>
</body>
</html>





