<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Cek_Absensi_Harian.xls");
?>

	<form action="absensi_aksi_input.php" class="posting" method="post">
		<h3 style="text-align: center;">
		SDN 1 Banua Kepayang<br>
		Jalan Banua Kepayang RT.01 RW.01
		<hr>
		Absensi Harian
		</h3>
		<?php
		if(isset($_GET['tanggal']))
		$tanggal  = $_GET['tanggal'];
		$kode_kelas=$_GET['kode_kelas'];
		?>
		<label for="tanggal">Tanggal :</label> <?php echo $_GET['tanggal']; ?><br>
		<label for="kelas">Kelas :</label> <?php echo $_GET['kode_kelas']; ?>

		<table width="600" border="1" align="center">
		<tr bgcolor="#ffffff">
		<td><div align="center"><strong>No</strong></div></td>
		<td><div align="center"><strong>Nis</strong></div></td>
		<td><div align="center"><strong>Nama Siswa</strong></div></td>
		<td><div align="center"><strong>Keterangan Absen</strong></div></td>
		</tr>
		
		<?php
		include 'koneksi.php';
		$no=0;
		  $tampil="SELECT * FROM absensi where kode_kelas='$kode_kelas' and tanggal='$tanggal'";
		  $qryTampil=mysql_query($tampil);
		  while ($dataTampil=mysql_fetch_array($qryTampil)) {
		  	$querySiswa = mysql_query("select nama_siswa from siswa where nis = '$dataTampil[nis]' && kode_kelas = '$dataTampil[kode_kelas]'");
		  	$dataSiswa = mysql_fetch_array($querySiswa);
		 $no++;
		 ?>
		 
		<tr bgcolor="#FFFFFF">
		<td align="center"><?php echo $no ; ?></td>
		<td align="center"><?php echo $dataTampil['nis']; ?></td>
		<td align="center"><?php echo $dataSiswa['nama_siswa']; ?></td>
		<td align="center"><?php echo $dataTampil['keterangan']; ?></td>
		</tr>
		<?php } ?>		
		</table>
		&nbsp;
		<div align="right">
			Banua Kepayang,
			<?php  
			$namabulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
			echo date("j")." ".$namabulan[date("n")]." ".date("Y");
			?>
			<br />
			Kepala Sekolah SDN 1 Banua Kepayang
			<br />
			&nbsp;
			<br />
			&nbsp;
			<br />
			&nbsp;
			<br />
			&nbsp;
			<br />
			&nbsp;
			...........................................................
		</div>
	</form>