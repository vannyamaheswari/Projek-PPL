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
 <title>Absensi Siswa SDN 1 Banua Kepayang</title>
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
  <img src="gambar/admin.jpg" width="300" alt="">
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
	<form action="absensi_aksi_edit.php" class="posting" method="post" enctype="multipart/form-data">
		<?php 
		include "koneksi.php";
		$id_absensi=$_GET['id_absensi'];
		$query=mysql_query("select * from absensi where id_absensi='$id_absensi' && nis='$_GET[nis]'");
		$querySiswa=mysql_query("select nama_siswa from siswa where nis='$_GET[nis]'");
		?>
		<h1 align="center">Edit Data Absensi</h1>
		<table border="0">
		<?php
		while($row=mysql_fetch_array($query)){
			$nis=$row['nis'];
			$keterangan=$row['keterangan'];
		?>
		<?php
		while($row1=mysql_fetch_array($querySiswa)){
		?>
		<tr>
		<td><input type="hidden" name="id_absensi" value="<?php echo $row['id_absensi'];?>" /></td>
		</tr>
		<tr>
		<td><label for="nis">NIS</label></td>
		<td>:</td>
		<td><input type="text" name="nis" id="nis" class="input1" placeholder="nis"  disabled="disabled" value="<?php echo $row['nis'];?>" required /></td>
		</tr>
		<tr>
		<td><label for="nama_siswa">Nama Siswa</label></td>
		<td>:</td>
		<td><input type="text" name="nama_siswa" id="nama_siswa" class="input1" placeholder="nama siswa" disabled="disabled" value="<?php echo $row1['nama_siswa'];?>" required /></td>
		</tr>
		<td><label for="tanggal">Tanggal</label></td>
		<td>:</td>
		<td><input type="text" name="tanggal" id="tanggal" class="input1" placeholder="tanggal" disabled="disabled" value="<?php echo $row['tanggal'];?>" required /></td>
		</tr>
		<tr>
		<td><label for="keterangan">Keterangan</label></td>
		<td>:</td>
		<td>
			<select name="keterangan" class="input5">
			<option value="" selected="selected">--Pilih Keterangan
			<option value="Hadir"<?php if ($keterangan=="Hadir") { echo "selected=\"selected\""; } ?>>Hadir</option>
			<option value="Sakit"<?php if ($keterangan=="Sakit") { echo "selected=\"selected\""; } ?>>Sakit</option>
			<option value="Izin"<?php if ($keterangan=="Izin") { echo "selected=\"selected\""; } ?>>Izin</option>
			<option value="Alpa"<?php if ($keterangan=="Alpa") { echo "selected=\"selected\""; } ?>>Alpa</option>
			</select>
		</td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><input type="submit" class="btn" value="Update" /></td>
		</tr>
		<?php } ?>
		<?php } ?>
		</table>
	</form>

</body>
</html>
<?php } ?>