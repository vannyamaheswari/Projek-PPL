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
<script>
  $(function() {
    $( "#tanggal_lahir" ).datepicker({
maxDate:"0",
dateFormat: "yy-mm-dd",
changeMonth: true,
changeYear: true,
yearRange: "-116:"
});
  });
</script>
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
<form action="siswa_aksi_input.php" class="posting" method="post">
		<h1 align="center">Input Data Siswa</h1>
		<table border="0">
		<tr>
		<td><label for="nis">NIS</label></td>
		<td>:</td>
		<td><input type="text" name="nis" id="nis" class="input1" placeholder="nis" required /></td>
		</tr>
		<tr>
		<td><label for="nama_siswa">Nama Siswa</label></td>
		<td>:</td>
		<td><input type="text" name="nama_siswa" id="nama_siswa" class="input1" placeholder="nama siswa" required /></td>
		</tr>
		<tr>
		<td><label for="tempat_lahir">Tempat Lahir</label></td>
		<td>:</td>
		<td><input type="text" name="tempat_lahir" id="tempat_lahir" class="input1" placeholder="tempat lahir" required /></td>
		</tr>
		<td><label for="tanggal_lahir">Tanggal Lahir</label></td>
		<td>:</td>
		<td><input type="text" name="tanggal_lahir" id="tanggal_lahir" class="input1" placeholder="tanggal lahir" required /></td>
		</tr>
		<tr>
		<td><label for="jenis_kelamin">Jenis Kelamin</label></td>
		<td>:</td>
		<td><input type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin" required/><label class="" for="">Laki-laki </label>
		<input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin" required/><label class="" for="">Perempuan </label></td>
		</tr>
		<tr>
		<td><label for="agama">Agama</label></td>
		<td>:</td>
		<td><select name="agama" class="input5" required>
		<option value="" selected="selected">--Pilih Agama
		<option value="Islam">Islam</option>
		<option value="Kristen Katholik">Kristen Katholik</option>
		<option value="Kristen Protestan">Kristen Protestan</option>
		<option value="Hindu">Hindu</option>
		<option value="Budha">Budha</option>
		</select></td>
		</tr>
		<tr>
		<td><label for="alamat">Alamat</label></td>
		<td>:</td>
		<td><textarea name="alamat" id="alamat" class="input2" rows="5" cols="30" placeholder="alamat" required></textarea></td>
		</tr>
		<tr>
		<td><label for="kode_kelas">Kelas</label></td>
		<td>:</td>
		<td><select name="kode_kelas" class="input5" required>
		<option value="" selected="selected">--Pilih Kelas
		<?php
		include "koneksi.php";
		$sql="SELECT * FROM kelas";
		$hasil_query=mysql_query($sql);
		while($baris=mysql_fetch_object($hasil_query))
		{
			echo"<option value=$baris->kode_kelas>$baris->kode_kelas</option>";
		}
		?>
		</select></td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><input type="submit" class="btn" value="Simpan" />
		<input type="reset" class="btn1" value="Batal" />
		</td>
		</tr>
		</table>
	</form>

</body>
</html>
<?php } ?>