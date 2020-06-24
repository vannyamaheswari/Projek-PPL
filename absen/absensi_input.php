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
	<form action="absensi_aksi_input.php" class="posting" method="post">
	<h1 align="center">Input Absensi</h1>
		<?php
		$tanggal=$_POST['tanggal'];
		$kode_kelas=$_POST['kode_kelas'];
		?>
		<label for="tanggal">Tanggal</label>
		<input type="text" name="tanggal" id="tanggal" class="input" readonly="readonly" value=<?php echo "$tanggal"?> placeholder="tanggal" required />
		<label for="kelas">Kelas</label>
		<input type="text" name="kode_kelas" id="kode_kelas" class="input" readonly="readonly" value=<?php echo "$kode_kelas"?> placeholder="kelas" required />
		<table width="990" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000" celpading="2" celspacing="1" >
		<tr bgcolor="#E6E6FA">
		<td><div align="center"><strong>No</strong></div></td>
		<td><div align="center"><strong>Nis</strong></div></td>
		<td><div align="center"><strong>Nama Siswa</strong></div></td>
		<td><div align="center"><strong>Keterangan Absen</strong></div></td>
		</tr>
		
			<?php
			include "koneksi.php";	
			$no=0;
			  $tampil="SELECT * FROM siswa where kode_kelas='$kode_kelas'";
			  $qryTampil=mysql_query($tampil);
			  while ($dataTampil=mysql_fetch_array($qryTampil)) {
			 $no++;
			 ?>
			
			<tr bgcolor="#FFFFFF">
			<td align="center"><?php echo $no ; ?></td>
			<td align="center"><input type="text" name="nis[]" id="nis" class="input4" readonly="readonly" placeholder="nis" value="<?php echo $dataTampil['nis'];?>" required /></td>
			<td align="center"><?php echo $dataTampil['nama_siswa']; ?></td>
			<td align="center">
			<select name="keterangan[]" class="input3" required>
			<option value="" selected="selected">--Pilih Keterangan
			<option value="Hadir">Hadir</option>
			<option value="Sakit">Sakit</option>
			<option value="Izin">Izin</option>
			<option value="Alpa">Alpa</option>
			</select>
			</td>
			</tr>
			<?php } ?>		
		</table>
		
			<input type="submit" class="btn" value="Simpan" />
			<input type="reset" class="btn1" value="Batal" />
	</form>

</body>
</html>
<?php } ?>