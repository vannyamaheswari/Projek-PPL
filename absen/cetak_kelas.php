<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Kelas.xls");
?>
		<h3 style="text-align: center;">
		SDN 1 Banua Kepayang<br>
		Jalan Banua Kepayang RT.01 RW.01
		<hr>
		</h3>
		<table width="500" border="1" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000" celpading="2" celspacing="1" >
		<tr bgcolor="#ffffff">
		<td><div align="center"><strong>Kode Kelas</strong></div></td>
		<td><div align="center"><strong>Kelas</strong></div></td>
		</tr>
			<?php
			include "koneksi.php";	
			$no=0;
			  $tampil="SELECT * FROM kelas";
			  $qryTampil=mysql_query($tampil);
			  while ($dataTampil=mysql_fetch_array($qryTampil)) {
			 $no++;
			 ?>
			 
			<tr bgcolor="#FFFFFF">
			<td align="center"><?php echo $dataTampil['kode_kelas']; ?></td>
			<td align="center"><?php echo $dataTampil['kelas']; ?></td>
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