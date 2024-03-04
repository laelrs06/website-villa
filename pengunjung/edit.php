<?php
session_start();
include '../koneksi.php';
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login/index.php");
    exit(); // Terminate script execution after the redirect
}

$id_pengunjung = $_GET['id_pengunjung'];
$data = mysqli_query($koneksi,"select * from pengunjung where id_pengunjung='$id_pengunjung'");

$result = [];


while($d = mysqli_fetch_assoc($data))
{
	$result[] = $d;
}

$result= $result[0];



?>
<!DOCTYPE html>
	<html>
	<head>
		<title>villaest</title>
		<link rel="stylesheet" type="text/css" href="../../toko_bunda/css/style3.css">
	</head>
	<body>
	 	<?php
		include '../koneksi.php';
		$id_pengunjung = $_GET['id_pengunjung'];
		$data = mysqli_query($koneksi,"select * from pengunjung where id_pengunjung='$id_pengunjung'");
		while($d = mysqli_fetch_array($data)){
			?>
			<div class="kotak_login">
	     	<center><h3>EDIT DATA PENGUNJUNG </h3></center>
			<form method="post" action="update.php">
				
				<label>ID PENGUNJUNG</label>
				<input type="text" name="id_pengunjung" class="form_login" placeholder="masukkan id pengunjung anda" 
                value="<?php echo $d['id_pengunjung']; ?>">
	 
				<label>NAMA PENGUNJUNG</label>
				<input type="text" name="nama_pengunjung" class="form_login" placeholder="masukkan nama anda" 
                value="<?php echo $d['nama_pengunjung']; ?>">
	            
	            <label>NO HP</label>
				<input type="number" name="no_hp" class="form_login" placeholder="masukkan nomor hp " 
                value="<?php echo $d['no_hp']; ?>">

				<label>ALAMAT</label>
				<input type="text" name="alamat" class="form_login" placeholder="masukkan alamat anda" 
                value="<?php echo $d['alamat'];?>">

				<label>NO VILLA</label>
				<input type="number" name="no_villa" class="form_login" placeholder="masukkan nomor villa" 
                value="<?php echo $d['no_villa'];?>">
	 
				<input type="submit" name="submit" class="tombol_login" value="SIMPAN">
	 
				<br/>
				<br/>
				<center>
					<a class="link" href="../dashboard.php">KEMBALI</a>
				</center>
			</form></div>
			<?php 
		}
		?>
	</body>
	</html>