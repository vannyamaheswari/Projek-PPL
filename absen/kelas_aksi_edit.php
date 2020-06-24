 <?php ob_start();
include "koneksi.php";
$kode_kelas		= $_POST['kode_kelas'];
$kelas          = $_POST['kelas'];

$query=mysql_query("UPDATE kelas SET kode_kelas='$kode_kelas', kelas='$kelas' WHERE kode_kelas='$kode_kelas'");
{
			echo '<script language="javascript">
				  alert ("Data Kelas Berhasil Diupdate");
				  window.location="kelas_data.php";
				  </script>';
				  exit();
	}
?>
