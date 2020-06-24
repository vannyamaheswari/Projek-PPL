    <?php
    // Koneksi ke database
    include 'koneksi.php';
	//PERINTAH MENGECEK AGAR TIDAK TERDAPAT USER YANG SAMA
	$cek_absensi=mysql_num_rows(mysql_query("SELECT * FROM absensi WHERE tanggal='$_POST[tanggal]' and kode_kelas='$_POST[kode_kelas]'"));
	if ($cek_absensi > 0) {
			echo '<script language="javascript">
				  alert ("Data Absensi Sudah Ada");
				  window.location="absensi_data.php";
				  </script>';
				  exit();
	}
    // Ambil variabel yang dikirim dari form
    $nis = $_POST['nis'];
	$kode_kelas = $_POST['kode_kelas'];
	$tanggal = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	$jumlah_dipilih = count($nis);
	
    // Query Input Data
	for($x=0;$x<$jumlah_dipilih;$x++){
    	mysql_query("INSERT INTO absensi values(null,'$nis[$x]','$kode_kelas','$tanggal','$keterangan[$x]')");
    }
    // Apabila query untuk menginput data benar

        {
			echo '<script language="javascript">
				  alert ("Data Absensi Berhasil Diinput");
				  window.location="absensi_data.php";
				  </script>';
				  exit();
	}

    ?>
	