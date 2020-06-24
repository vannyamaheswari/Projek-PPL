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
   <li><a href="absensi_data.php"><i class="fa fa-database"></i> &nbsp;Input Absensi</a></li>
   <li><a href="absensi_cek.php"><i class="fa fa-check"></i> &nbsp;Cek Absensi</a></li>
   <li><a href="absensi_rekap.php"><i class="fa fa-file"></i> &nbsp;Rekap Absensi</a></li>
   <li><a href="logout.php"><i class="fa fa-ban"></i> &nbsp;Logout</a></li>
  </ul>
 </aside>
	<form action="absensi_hasil_rekap.php" class="posting" method="post">
	<table border="0">
	<h1 align="center">Rekap Absensi</h1>
		<tr>
		<td><label for="kode_kelas">Kelas</label></td>
		<td>:</td>
		<td><select name="kode_kelas" class="input5">
		<option value="" selected="selected">--Pilih Kelas
		<?php
		include "koneksi.php";
		$sql="SELECT * FROM kelas";
		$hasil_query=mysql_query($sql);
		while($baris=mysql_fetch_object($hasil_query))
		{
			echo"<option value=$baris->kode_kelas>$baris->kode_kelas</option>";
		}
		?></td>
		</tr>
		<tr>
		<td><label for="bulan">Bulan</label></td>
		<td>:</td>
		<td>
		<select name="bulan" class="input5">
		<option value="" selected="selected">--Pilih Bulan
		<option value="01">Januari</option>
		<option value="02">Februari</option>
		<option value="03">Maret</option>
		<option value="04">April</option>
		<option value="05">Mei</option>
		<option value="06">Juni</option>
		<option value="07">Juli</option>
		<option value="08">Agustus</option>
		<option value="09">September</option>
		<option value="10">Oktober</option>
		<option value="11">Nopember</option>
		<option value="12">Desember</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><label for="tahun">Tahun</label></td>
		<td>:</td>
		<td>
		<select name="tahun" class="input5">
		<option value="" selected="selected">--Pilih Tahun
		<?php
		$mulai= date('Y');
		for($i = $mulai;$i<$mulai + 100;$i++){
			$sel = $i == date('Y');
			echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
		}
		?>
		</select>
		</td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><input type="submit" class="btn" value="Tampilkan Absensi" /></td>
		</tr>
	</table>
	</form>

</body>
</html>
<?php } ?>