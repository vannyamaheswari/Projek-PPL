 <?php ob_start();
include "koneksi.php";
$id_absensi = $_POST['id_absensi'];
$keterangan  = $_POST['keterangan'];

$query=mysql_query("UPDATE absensi SET keterangan='$keterangan' WHERE id_absensi='$id_absensi'");
{
			echo '<script language="javascript">
				  alert ("Data Absensi Berhasil Diupdate");
				  window.location="absensi_cek.php";
				  </script>';
				  exit();
	}
?>
