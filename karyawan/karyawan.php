<!DOCTYPE html>
<html lang="en">
<head>
  <title>VILLAEST</title>
  <link rel="stylesheet" href="../../toko_bunda/css/style.css" />
  <!-- Font Awesome Cdn Link -->
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
   <!--  <nav>
      <div class="navbar">
        <div class="logo">
        <img src="../../toko_bunda/image/villaest.png" alt="">
          <center>
          <h1>VILLAEST</h1>
        </center>
     -->
    <section class="main">
      <div class="main-top">
        <p>welcome to villaest!</p>
      </div>
      <div class="main-body">
        <center>
        <h1>DATA KARYAWAN VILLAEST</h1>
      </center>
  <br/>
  <a href="tambah.php" class="icon-button">
        <i class="fas fa-plus" href="tambah.php"> TAMBAH DATA KARYAWAN</i>
    </a>
     <a href="../dashboard.php" class="icon-button">
        <i class="fas fa-backward" herf="tambah.php"> BACK</i>
    </a>
  <br/>
  <br/>
  <table class="table">
  <thead>
   <tr>
      <th scope="col">Id Karyawan</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Edit</th>
      <th scope="col1">Hapus</th>
    </tr>
  </thead>
 
  <?php
    include '../koneksi.php'; 
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $data = mysqli_query($koneksi,"select * from karyawan");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    $data = mysqli_query($koneksi,"select * from karyawan limit $halaman_awal, $batas");
    $nomor = $halaman_awal+1;
    while($d = mysqli_fetch_array($data)){  
  
    // $data = mysqli_query($koneksi,"select * from karyawan");
    // while($d = mysqli_fetch_array($data)){
  ?>
      <tr>
        <td><?php echo $d['id_karyawan']; ?></td>
        <td><?php echo $d['username']; ?></td>
          <td><?php echo $d['password']; ?></td>
        <td><?php echo $d['email']; ?></td>
        <td>
          <a href="edit.php?id_karyawan=<?php echo $d['id_karyawan']; ?>" onclick="return confirm ('yakin mau diedit bang?');" class="btn btn-outline-success">
          <i class="fas fa-pen"></i> </a></td>
          <td><a href="hapus.php?id_karyawan=<?php echo $d['id_karyawan']; ?>" onclick="return confirm ('serius mau dihapus?');" class="btn btn-outline-danger">
            <i class="fas fa-eraser"></i></a>
          </td>
        </td>
      </tr>
      <?php 
    }
    ?>
</center>
  </table>
  
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
        </li>
        <?php 
        for($x=1;$x<=$total_halaman;$x++){
          ?> 
          <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
        }
        ?>        
        <li class="page-item">
          <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
        </li>
      </ul>
      </div> 
</section>
</body>
</html>
