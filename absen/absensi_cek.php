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
    $( "#tanggal" ).datepicker({
maxDate:"0",
dateFormat: "yy-mm-dd",
changeMonth: true,
changeYear: true,
yearRange: "-116:",
numberOfMounth: 2,
beforeShowDay: function(dt) {
	var Day = dt.getDay();
	if (Day == 0) {
		return [false];
	} else {
		return [true];
	}
}
});
    function disabledModay(date){
    	var day = getDay();
    	return [(day == 5 || day == 6 || day == 0 || (day == 1 && date.getDate() > 7)), ''];
    }
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
	<form action="absensi_hasil_cek.php" id="co" class="posting" method="post">
	<table border="0">
	<h1 align="center">Cek Absensi Harian</h1>
		<tr>
		<td><label for="tanggal">Tanggal</label></td>
		<td>:</td>
		<td><input type="text" name="tanggal" id="tanggal" class="input1" placeholder="tanggal" required /></td>
		</tr>
		<tr>
		<td><label for="kelas">Kelas</label></td>
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
		<td></td>
		<td></td>
		<td><input type="submit" class="btn" value="Cek Absensi" /></td>
		</tr>
	</table>
	</form>

</body>
</html>
<?php } ?>