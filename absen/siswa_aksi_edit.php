 <?php ob_start();
include "koneksi.php";
$nis          	= $_POST['nis'];
$nama_siswa      = $_POST['nama_siswa'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$agama         = $_POST['agama'];
$alamat         = $_POST['alamat'];
$kode_kelas  = $_POST['kode_kelas'];

$query=mysql_query("UPDATE siswa SET nis='$nis', nama_siswa='$nama_siswa', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', 
jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', kode_kelas='$kode_kelas' WHERE nis='$nis'");
{
			echo '<script language="javascript">
				  alert ("Data Siswa Berhasil Diupdate");
				  window.location="siswa_data.php";
				  </script>';
				  exit();
	}
?>

