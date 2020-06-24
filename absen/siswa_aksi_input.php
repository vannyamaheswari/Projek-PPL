    <?php
    // Koneksi ke database
    $konek = mysqli_connect("localhost","root","","db_absensi");
    // Ambil variabel yang dikirim dari form
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$kode_kelas = $_POST['kode_kelas'];
	
    // Query Input Data
    $input = "INSERT INTO siswa(nis, nama_siswa, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, kode_kelas) 
	VALUES ('$nis','$nama_siswa','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$kode_kelas')";
    $hasil = mysqli_query($konek,$input);
    // Apabila query untuk menginput data benar
    if($hasil){
			echo '<script language="javascript">
				  alert ("Data Siswa Berhasil Diinput");
				  window.location="siswa_data.php";
				  </script>';
				  exit();
	}
    else {
			echo '<script language="javascript">
				  alert ("Data Siswa Gagal Diinput");
				  window.location="siswa_data.php";
				  </script>';
				  exit();
    }
    ?>
	
	
	
	
	
	