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
	<form action="siswa_tambah.php" class="posting">
		<input type="submit" class="btn" value="Tambah Siswa" />
		<table width="990" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000" celpading="2" celspacing="1" >
		<tr bgcolor="#E6E6FA">
		<td><div align="center"><strong>No</strong></div></td>
		<td><div align="center"><strong>Nis</strong></div></td>
		<td><div align="center"><strong>Nama Siswa</strong></div></td>
		<td><div align="center"><strong>Tempat Lahir</strong></div></td>
		<td><div align="center"><strong>Tanggal Lahir</strong></div></td>
		<td><div align="center"><strong>Jenis Kelamin</strong></div></td>
		<td><div align="center"><strong>Agama</strong></div></td>
		<td><div align="center"><strong>Alamat</strong></div></td>
		<td><div align="center"><strong>Kelas</strong></div></td>
		<td colspan="2"><div align="center"><strong>Aksi</strong></div></td>
		</tr>
			<?php
			include "koneksi.php";
			$batas = 20;
			$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
			 
			if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
			} else {
			$posisi = ( $pg - 1 ) * $batas;
			}	
			$no=0+$posisi;
			  $tampil="SELECT * FROM siswa, kelas WHERE siswa.kode_kelas=kelas.kode_kelas limit $posisi, $batas";
			  $qryTampil=mysql_query($tampil);
			  if ($qryTampil === FALSE) {
					die(mysql_error());
				}
			  while ($dataTampil=mysql_fetch_array($qryTampil)) {
			 $no++;
			 ?>
			 
			<tr bgcolor="#FFFFFF">
			<td align="center"><?php echo $no ; ?></td>
			<td align="center"><?php echo $dataTampil['nis']; ?></td>
			<td align="center"><?php echo $dataTampil['nama_siswa']; ?></td>
			<td align="center"><?php echo $dataTampil['tempat_lahir']; ?></td>
			<td align="center"><?php echo $dataTampil['tanggal_lahir']; ?></td>
			<td align="center"><?php echo $dataTampil['jenis_kelamin']; ?></td>
			<td align="center"><?php echo $dataTampil['agama']; ?></td>
			<td align="center"><?php echo $dataTampil['alamat']; ?></td>
			<td align="center"><?php echo $dataTampil['kode_kelas']; ?></td>
			<td>
			<div align="center">
			<a href="siswa_hapus.php?nis=<?php echo $dataTampil['nis'] ; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><img src="gambar/hapus.png" width="20"></a>
			</td>
			<td>
			<a href="siswa_edit.php?nis=<?php echo $dataTampil['nis']; ?>"><img src="gambar/edit.png" width="20"></a>
			</div>
			</td>
			</tr>
			<?php } ?>
			
			<tr bgcolor="#FFFFFF">
			<td colspan="11">
			<?php
			//hitung jumlah data
			$jml_data = mysql_num_rows(mysql_query("SELECT * FROM siswa"));
			//Jumlah halaman
			$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
			if ( $pg > 1 ) {
			$link = $pg-1;
			$prev = "<a href='?pg=$link'>Sebelumnya </a>";
			} else {
			$prev = "Sebelumnya ";
			}
			
			$nmr = '';
			for ( $i = 1; $i<= $JmlHalaman; $i++ ){
			 
			if ( $i == $pg ) {
			$nmr .= $i . " ";
			} else {
			$nmr .= "<a href='?pg=$i'>$i</a> ";
			}
			}
			
			if ( $pg < $JmlHalaman ) {
			$link = $pg + 1;
			$next = " <a href='?pg=$link'>Selanjutnya</a>";
			} else {
			$next = "Selanjutnya";
			}
			
			echo $prev . $nmr . $next;
			 ?>
			 </td>
			 </tr>
		</table>
		<a href="cetak_siswa.php"><input type="button" class="btn" value="Download Excel" /></a>
	</form>

</body>
</html>
<?php } ?>