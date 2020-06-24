<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap_Absensi.xls");
?>
<form action="" method="">
		<?php
			$kode_kelas=$_GET['kode_kelas'];
			$bulan=$_GET['bulan'];
			$tahun=$_GET['tahun'];
		?>
		<h3 style="text-align: center;">
		SDN 1 Banua Kepayang<br>
		Jalan Banua Kepayang RT.01 RW.01
		<hr>
		Rekap Absensi
		</h3>
		<label for="kode_kelas">Kelas :</label> <?php echo $_GET['kode_kelas']; ?><br>
		<label for="bulan">Bulan :</label> <?php echo $_GET['bulan']; ?><br>
		<label for="tahun">Tahun :</label> <?php echo $_GET['tahun']; ?>
		<table width="600" border="1" align="center">
		<tr>
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
</body>
</html>