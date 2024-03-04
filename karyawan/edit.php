<!DOCTYPE html>
	<html>
	<head>
		<title>villaest</title>
		<link rel="stylesheet" type="text/css" href="../../toko_bunda/css/style3.css">
	</head>
	<body>
	 	<?php
	 	include '../koneksi.php';
	 	$id_karyawan = $_GET['id_karyawan'];
	 	$data = mysqli_query($koneksi,"select * from karyawan where id_karyawan='$id_karyawan'");
	 	while($d = mysqli_fetch_array($data)){
	 	?>
			<div class="kotak_login">
	     	<center><h3>EDIT DATA PENGUNJUNG </h3></center>
			<form method="post" action="update.php">
				
				<label>ID KARYAWAN</label>
				<input type="text" name="id_karyawan" class="form_login" placeholder="masukkan id karyawan anda" value="<?php echo $d['id_karyawan']; ?>">
	 
				<label>USERNAME</label>
				<input type="text" name="username" class="form_login" placeholder="masukkan username anda" value="<?php echo $d['username']; ?>">
	            
	            <label>PASSWORD</label>
				<input type="password" name="password" class="form_login" placeholder="masukkan password anda " value="<?php echo $d['password']; ?>">

				<label>EMAIL</label>
				<input type="text" name="email" class="form_login" placeholder="masukkan email anda" value="<?php echo $d['email'];?>">
	 
				<input type="submit" class="tombol_login" value="SIMPAN">
	 
				<br/>
				<br/>
				<center>
					<a class="link" href="karyawan.php">KEMBALI</a>
				</center>
			</form></div>
			<?php 
		}
		?>
	</body>
	</html>