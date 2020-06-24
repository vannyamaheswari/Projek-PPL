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
 <LINK rel="stylesheet" type="text/css" href="style.css" media="screen">  
 <LINK rel="stylesheet" type="text/css" href="print.css" media="print">
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
	<form action="" class="posting" method="post">
	<table align="left" border="0">
	<h1 align="center">Rekap Absensi</h1>
		<?php
		$kode_kelas=$_POST['kode_kelas'];
		$bulan=$_POST['bulan'];
		$tahun=$_POST['tahun'];
		if (isset($_POST['cetak'])) {
			$kode_kelas=$_POST['kode_kelas'];
			$bulan=$_POST['bulan'];
			$tahun=$_POST['tahun'];
		}
		?>
		<tr>
		<td><label for="kode_kelas">Kelas</label></td>
		<td>:</td>
		<td><input type="text" name="kode_kelas" id="kode_kelas" class="input" disabled="disabled" value="<?php echo "$kode_kelas"?>"  placeholder="kelas" required /></td>
		<td><label for="bulan">Bulan</label></td>
		<td>:</td>
		<td><input type="text" name="bulan" id="bulan" class="input" disabled="disabled" value="<?php echo "$bulan"?>"  placeholder="bulan" required /></td>
		<td><label for="tahun">Tahun</label></td>
		<td>:</td>
		<td><input type="text" name="tahun" id="tahun" class="input" disabled="disabled" value="<?php echo "$tahun"?>"  placeholder="tahun" required /></td>
		</tr>
	</table>
		<table width="990" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000" celpading="2" celspacing="1" >
		<tr bgcolor="#E6E6FA">
		<td><div align="center"><strong>No</strong></div></td>
		<td><div align="center"><strong>Nis</strong></div></td>
		<td><div align="center"><strong>Nama Siswa</strong></div></td>
		<td><div align="center"><strong>Hadir</strong></div></td>
		<td><div align="center"><strong>Sakit</strong></div></td>
		<td><div align="center"><strong>Izin</strong></div></td>
		<td><div align="center"><strong>Alpa</strong></div></td>
		</tr>
		
		<?php
		include "koneksi.php";	
		$no=0;
		  $tampil="SELECT * FROM siswa where kode_kelas='$kode_kelas'";
		  $qryTampil=mysql_query($tampil);
		  while ($dataTampil=mysql_fetch_array($qryTampil)) {
			  $sakit = mysql_num_rows(mysql_query("select * from absensi where nis='$dataTampil[nis]' && keterangan='Sakit' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun'"));
			  $hadir = mysql_num_rows(mysql_query("select * from absensi where nis='$dataTampil[nis]' && keterangan='Hadir' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun'"));
			  $izin = mysql_num_rows(mysql_query("select * from absensi where nis='$dataTampil[nis]' && keterangan='Izin' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun'"));
			  $alpa = mysql_num_rows(mysql_query("select * from absensi where nis='$dataTampil[nis]' && keterangan='Alpa' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun'"));


		  	$no++;
		 ?>
			 
		<tr bgcolor="#FFFFFF">
		<td align="center"><?php echo $no ; ?></td>
		<td align="center"><?php echo $dataTampil['nis']; ?></td>
		<td align="center"><?php echo $dataTampil['nama_siswa']; ?></td>
		<td align="center"><?php echo $hadir ?></td>
		<td align="center"><?php echo $sakit ?></td>
		<td align="center"><?php echo $izin ?></td>
		<td align="center"><?php echo $alpa  ?></td>
		</tr>
		<?php } ?>
		</table>
		<a href="cetak_hasil_rekap.php?kode_kelas=<?php echo $kode_kelas ?>&bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>"><input type="button" class="btn" value="Download Excel" /></a>
	</form>
</body>
</html>
<?php } ?>