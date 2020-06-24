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
	<form action="siswa_aksi_edit.php" class="posting" method="post" enctype="multipart/form-data">
		<?php 
		include "koneksi.php";
		$nis=$_GET['nis'];
		$query=mysql_query("select * from siswa where nis='$nis'");
		?>
		<h1 align="center">Edit Data Siswa</h1>
		<table border="0">
		<?php
		while($row=mysql_fetch_array($query)){
			$jenis_kelamin=$row['jenis_kelamin'];
			$agama=$row['agama'];
			$kode_kelas=$row['kode_kelas'];
		?>
		<tr>
		<td><input type="hidden" name="nis" value="<?php echo $row['nis'];?>" /></td>
		</tr>
		<tr>
		<td><label for="nis">NIS</label></td>
		<td>:</td>
		<td><input type="text" name="nis" id="nis" class="input1" placeholder="nis"  disabled="disabled" value="<?php echo $row['nis'];?>" required /></td>
		</tr>
		<tr>
		<td><label for="nama_siswa">Nama Siswa</label></td>
		<td>:</td>
		<td><input type="text" name="nama_siswa" id="nama_siswa" class="input1" placeholder="nama siswa" value="<?php echo $row['nama_siswa'];?>" required /></td>
		</tr>
		<tr>
		<td><label for="tempat_lahir">Tempat Lahir</label></td>
		<td>:</td>
		<td><input type="text" name="tempat_lahir" id="tempat_lahir" class="input1" placeholder="tempat lahir" value="<?php echo $row['tempat_lahir'];?>" required /></td>
		</tr>
		<td><label for="tanggal_lahir">Tanggal Lahir</label></td>
		<td>:</td>
		<td><input type="text" name="tanggal_lahir" id="tanggal_lahir" class="input1" placeholder="tanggal lahir" value="<?php echo $row['tanggal_lahir'];?>" required /></td>
		</tr>
		<tr>
		<td><label for="jenis_kelamin">Jenis Kelamin</label></td>
		<td>:</td>
		<td>
		<input type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin" <?php if($jenis_kelamin=="Laki-laki"){echo "checked=\"checked\"";}?><label class="" for="">Laki-laki </label>
		<input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin" <?php if($jenis_kelamin=="Perempuan"){echo "checked=\"checked\"";}?><label class="" for="">Perempuan </label>
		</td>
		</tr>
		<tr>
		<td><label for="agama">Agama</label></td>
		<td>:</td>
		<td>
		<select name="agama" class="input5" required>
		<option value="" selected="selected">--Pilih Agama
		<option value="Islam"<?php if ($agama=="Islam") { echo "selected=\"selected\""; } ?>>Islam</option>
		<option value="Kristen Katholik"<?php if ($agama=="Kristen Katholik") { echo "selected=\"selected\""; } ?>>Kristen Katholik</option>
		<option value="Kristen Protestan"<?php if ($agama=="Kristen Protestan") { echo "selected=\"selected\""; } ?>>Kristen Protestan</option>
		<option value="Hindu"<?php if ($agama=="Hindu") { echo "selected=\"selected\""; } ?>>Hindu</option>
		<option value="Budha"<?php if ($agama=="Budha") { echo "selected=\"selected\""; } ?>>Budha</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><label for="alamat">Alamat</label></td>
		<td>:</td>
		<td><textarea name="alamat" id="alamat" class="input2" rows="5" cols="30" placeholder="alamat" required><?php echo $row['alamat'];?></textarea></td>
		</tr>
		<tr>
		<td><label for="kode_kelas">Kelas</label></td>
		<td>:</td>
		<td>
		<select name="kode_kelas" class="input5" required>
		<option value="">--Pilih Kelas --</option>
		<?php
		$hasil_query=mysql_query("SELECT kode_kelas FROM kelas");
		while($baris=mysql_fetch_array($hasil_query))
		{
		echo"<option value='{$baris['kode_kelas']}'".($row['kode_kelas'] == $baris['kode_kelas']?" selected":"").">{$baris['kode_kelas']}</option>";
		}
		?>
		</select>
		</td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><input type="submit" class="btn" value="Update" /></td>
		</tr>
		<?php } ?>
		</table>
	</form>

</body>
</html>
<?php } ?>