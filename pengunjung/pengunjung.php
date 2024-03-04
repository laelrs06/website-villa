
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VILLAEST</title>
  <link rel="stylesheet" href="../../toko_bunda/css/style.css" />
  <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
   
    <section class="main">
      <div class="main-top">
        <p>welcome to villaest!</p>
      </div>
      <div class="main-body">
        <center>
        <h1>DATA PENGUNJUNG VILLAEST</h1>
      </center>
       <div class="job_card">
                <div class="">
                    <div class="img">
                        <i class=""></i>
                    </div>

                    <a href="tambah.php" class="icon-button">
                        <i class="fas fa-plus" herf="tambah.php"> TAMBAH DATA</i>
                    </a>

                    <a href="../dashboard.php" class="icon-button">
                    <i class="fas fa-backward" herf="tambah.php"> BACK</i>
                    </a>

  <br/>
  <br/>
  <table class="table">
  <thead>
    <tr>
      <th>Id Pengunjung</th>
      <th>Id Karyawan</th>
      <th>Petugas</th>
      <th>Nama Pengunjung</th>
      <th>No HP</th>
      <th>Alamat</th>
      <th>No Villa</th>
         <th colspan="2">OPSI</th>
    </tr>
  </thead>
 
  <?php
    include '../koneksi.php'; 
    $batas = 5;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
    $previous = $halaman - 1;
    $next = $halaman + 1;
    
     $data = mysqli_query($koneksi, "SELECT pengunjung.*, karyawan.username 
      FROM pengunjung 
      INNER JOIN karyawan ON pengunjung.id_karyawan = karyawan.id_karyawan ORDER BY pengunjung.id_pengunjung ASC LIMIT $halaman_awal, $batas");

     $data_page = mysqli_query($koneksi, "SELECT * from pengunjung");
     $jumlah_data = mysqli_num_rows($data_page);
     $total_halaman = ceil($jumlah_data / $batas);
     $data_page = mysqli_query($koneksi, "SELECT * from pengunjung limit $halaman_awal, $batas");
     $nomor = $halaman_awal + 1;
    while($d = mysqli_fetch_array($data)){  
  
    // $data = mysqli_query($koneksi,"select * from pengunjung");
    // while($d = mysqli_fetch_array($data)){
  ?>
      <tr>
        <td><?php echo $d['id_pengunjung']; ?></td>
        <td><?php echo $d['id_karyawan']; ?></td>
       <td><?php echo $d['username']; ?></td>
        <td><?php echo $d['nama_pengunjung']; ?></td>
        <td><?php echo $d['no_hp']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['no_villa']; ?></td>
        <td>
          <a href="edit.php?id_pengunjung=<?php echo $d['id_pengunjung']; ?>" onclick="return confirm ('yakin mau diedit bang?');" class="btn btn-outline-success">
          <i class="fas fa-pen"></i> </a></td>
          <td><a href="hapus.php?id_pengunjung=<?php echo $d['id_pengunjung']; ?>" onclick="return confirm ('serius mau dihapus?');" class="btn btn-outline-danger">
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
    </div>
</section>
</body>
</html>
