<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Sistem Informasi Siswa Pondok Pesantren Assalafi Al Fithrah Semarang</title>
 <link rel="stylesheet" href="css/admin.css">
 <link rel="stylesheet" href="css/font-awesome.css">
 <link type="text/css"
	<link rel="stylesheet" href="jquery/jquery-ui.css" type="text/css"/>
	<script src="jquery/jquery-3.0.0.min.js" type="text/javascript"></script>
	<script src="jquery/jquery-ui.js" type="text/javascript"></script>
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
	<form action="absensi_aksi_input.php" class="posting" method="post">
	<table align="left" border="0">
	<h1 align="center">Cek Absensi Harian</h1>
		<?php
		$tanggal=$_POST['tanggal'];
		$kode_kelas=$_POST['kode_kelas'];
		?>
		<tr>
		<td><label for="tanggal">Tanggal</label></td>
		<td>:</td>
		<td><input type="text" name="tanggal" id="tanggal" class="input" disabled="disabled" value=<?php echo "$tanggal"?>  placeholder="tanggal" required /></td>
		<td><label for="kelas">Kelas</label></td>
		<td>:</td>
		<td><input type="text" name="kode_kelas" id="tanggal" class="input" disabled="disabled" value=<?php echo "$kode_kelas"?>  placeholder="kelas" required /></td>
		</tr>
	</table>
		<table width="990" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000" celpading="2" celspacing="1" >
		<tr bgcolor="#E6E6FA">
		<td><div align="center"><strong>No</strong></div></td>
		<td><div align="center"><strong>Nis</strong></div></td>
		<td><div align="center"><strong>Nama Siswa</strong></div></td>
		<td><div align="center"><strong>Keterangan Absen</strong></div></td>
		<td colspan="2"><div align="center"><strong>Aksi</strong></div></td>
		</tr>
		
		<?php
		include "koneksi.php";	
		$no=0;
		  $tampil="SELECT * FROM absensi WHERE kode_kelas='$kode_kelas' and tanggal='$tanggal'";
		  $qryTampil=mysql_query($tampil);
		  while ($dataTampil=mysql_fetch_array($qryTampil)) {
		  	$querySiswa = mysql_query("select nama_siswa from siswa where nis = '$dataTampil[nis]' && kode_kelas = '$dataTampil[kode_kelas]'");
		  	$dataSiswa = mysql_fetch_array($querySiswa);
		 $no++;
		 ?>
		 
		<tr bgcolor="#FFFFFF">
		<td align="center"><?php echo $no ; ?></td>
		<td align="center"><?php echo $dataTampil['nis']; ?></td>
		<td align="center"><?php echo $dataSiswa['nama_siswa']; ?></td>
		<td align="center"><?php echo $dataTampil['keterangan']; ?></td>
		<td><a href="absensi_edit.php?id_absensi=<?php echo $dataTampil['id_absensi']."&nis=".$dataTampil['nis']; ?>"><img src="gambar/edit.png" width="20"></a></div></td>
		</tr>
		<?php } ?>		
		</table>
		<a href="cetak_cek_absensi.php?tanggal=<?php echo $tanggal ?>&kode_kelas=<?php echo $kode_kelas ?>"><input type="button" class="btn" value="Download Excel" /></a>	
	</form>

</body>
</html>
<?php } ?>