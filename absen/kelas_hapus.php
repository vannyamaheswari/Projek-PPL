 <?php ob_start();
 include "koneksi.php";
 mysql_query("delete from kelas where kode_kelas='$_GET[kode_kelas]'");
{
			echo '<script language="javascript">
				  alert ("Data Kelas Berhasil Dihapus");
				  window.location="kelas_data.php";
				  </script>';
				  exit();
	}

?>

