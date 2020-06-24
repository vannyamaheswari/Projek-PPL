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
   <li><a href="absensi_data.php"><i class="fa fa-database"></i> &nbsp;Data Absensi</a></li>
   <li><a href="absensi_cek.php"><i class="fa fa-check"></i> &nbsp;Cek Absensi</a></li>
   <li><a href="absensi_rekap.php"><i class="fa fa-file"></i> &nbsp;Rekap Absensi</a></li>
   <li><a href="logout.php"><i class="fa fa-ban"></i> &nbsp;Logout</a></li>
  </ul>
 </aside>
	<form action="kelas_aksi_edit.php" class="posting" method="post">
		<?php 
		include "koneksi.php";
		$kode_kelas=$_GET['kode_kelas'];
		$query=mysql_query("select * from kelas where kode_kelas='$kode_kelas'");
		?>
		<h1 align="center">Edit Data Kelas</h1>
		<table border="0">
		<?php
		while($row=mysql_fetch_array($query)){
		?>
		<tr>
		<td><input type="hidden" name="kode_kelas" value="<?php echo $row['kode_kelas'];?>" /></td>
		</tr>
		<tr>
		<td><label for="kode_kelas">Kode Kelas</label></td>
		<td>:</td>
		<td><input type="text" name="kode_kelas" id="kode_kelas" class="input1" placeholder="kode kelas" disabled="disabled" value="<?php echo $row['kode_kelas'];?>" required /></td>
		</tr>
		<tr>
		<td><label for="kelas">Kelas</label></td>
		<td>:</td>
		<td><input type="text" name="kelas" id="kelas" class="input1" placeholder="kelas" value="<?php echo $row['kelas'];?>" required /></td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><input type="submit" class="btn" value="Simpan" /></td>
		</tr>
		<?php } ?>
		</table>
	</form>

</body>
</html>
<?php } ?>