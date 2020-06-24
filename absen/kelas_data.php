<?php
ob_start();
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Sistem Informasi Siswa Pondok Pesantren Assalafi Al Fithrah Semarang</title>
 <link rel="stylesheet" href="css/admin.css">
 <link rel="stylesheet" href="css/font-awesome.css">
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
	<form action="kelas_tambah.php" class="posting">
		<input type="submit" class="btn" value="Tambah Kelas" />
		<table width="500" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000" celpading="2" celspacing="1" >
		<tr bgcolor="#E6E6FA">
		<td><div align="center"><strong>Kode Kelas</strong></div></td>
		<td><div align="center"><strong>Kelas</strong></div></td>
		<td colspan="2"><div align="center"><strong>Aksi</strong></div></td>
		</tr>
			<?php
			include "koneksi.php";	
			$no=0;
			  $tampil="SELECT * FROM kelas";
			  $qryTampil=mysql_query($tampil);
			  while ($dataTampil=mysql_fetch_array($qryTampil)) {
			 $no++;
			 ?>
			 
			<tr bgcolor="#FFFFFF">
			<td align="center"><?php echo $dataTampil['kode_kelas']; ?></td>
			<td align="center"><?php echo $dataTampil['kelas']; ?></td>
			<td><a href="kelas_hapus.php?kode_kelas=<?php echo $dataTampil['kode_kelas'] ; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><img src="gambar/hapus.png" width="20"></a></div></td>
			<td><a href="kelas_edit.php?kode_kelas=<?php echo $dataTampil['kode_kelas']; ?>"><img src="gambar/edit.png" width="20"></a></td>
			</tr>
			<?php } ?>
		</table>
		<a href="cetak_kelas.php"><input type="button" class="btn" value="Download Excel" /></a> 
	</form>

</body>
</html>
<?php }
ob_end_flush();
?>