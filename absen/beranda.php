<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
  echo "<center>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
?>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Sistem Informasi Siswa Pondok Pesantren Assalafi Al Fithrah Semarang</title>
 <link rel="stylesheet" href="css/admin.css">
 <link rel="stylesheet" href="css/font-awesome.css">
 <link rel="stylesheet" type="text/css" href="css/slide.css" /> 
</head>
<body>
 <aside>

 <div class="brand">
  <img src="gambar/logo.png" width="200" alt="">
  <h2>Administrator</h2>
 </div>
 
  <ul class="menu">
   <li><a href="beranda.php"><i class="fa fa-home"></i> &nbsp;Beranda</a></li>
   <li><a href="siswa_data.php"><i class="fa fa-user-plus"></i> &nbsp;Data Siswa</a></li>
   <li><a href="kelas_data.php"><i class="fa fa-hospital-o"></i> &nbsp;Data Kelas</a></li>
   <li><a href="absensi_data.php"><i class="fa fa-database"></i> &nbsp;Input Absensi</a></li>
   <li><a href="absensi_cek.php"><i class="fa fa-check"></i> &nbsp;Cek Absensi</a></li>
   <li><a href="absensi_rekap.php"><i class="fa fa-file"></i> &nbsp;Rekap Absensi</a></li>
   <li><a href="logout.php"><i class="fa fa-ban"></i> &nbsp;Logout</a></li>
  </ul>
 </aside>
 <form action="" class="posting">
 <h1 align="center">Selamat Datang</h1>
 <h2 align="center">Di Sistem Informasi Siswa Pondok Pesantren Assalafi Al Fithrah Semarang<h2>
 <div class="slider">
<ul>
     <li>
         <a href="#" target="#">
         <img alt ="Images 1" src="gambar/welcome.jpg"/>
         </a>
     </li>

     <li>
         <a href="#" target="#">
         <img alt="Images 2" src="gambar/halamandpn.jpg" />
         </a>

         <div>
             <h3>Halaman Depan Pondok Pesantren Assalafi Al Fithrah Semarang</h3>
         </div>
     </li>

     <li>
         <a href="#" target="#">
         <img alt="Images 3" src="gambar/g1.jpg" />
         </a>
         <div>
             <h3>Majlis Sewelasan Bulan Maulid 1441 H Pondok Pesantren Assalafi Al Fithrah Semarang</h3>
         </div>
     </li>

     <li>
         <a href="#" target="#">
         <img alt="Images 4" src="gambar/haul_akbar.jpg" />
         </a>
         <div>
             <h3>HAUL AKBAR JATENG & DIY 2019</h3>
         </div>
     </li>
	 
	 <li>
         <a href="#" target="#">
         <img alt="Images 5" src="gambar/gb5.jpg" />
         </a>
         <div>
             <h3>Rekreasi Siswa/Siswi Pondok Pesantren Assalafi Al Fithrah Semarang</h3>
         </div>
     </li>
	 
	 <li>
         <a href="#" target="#">
         <img alt="Images 6" src="gambar/gb6.jpg" />
         </a>
         <div>
             <h3>Rekreasi Siswa/Siswi Pondok Pesantren Assalafi Al Fithrah Semarang</h3>
         </div>
     </li>
	 
	 	 <li>
         <a href="#" target="#">
         <img alt="Images 7" src="gambar/gb7.jpg" />
         </a>
         <div>
             <h3>Pendaftaran Santri Baru 2020/2021</h3>
         </div>
     </li>
</ul>
</div>
 </form>

</body>
</html>