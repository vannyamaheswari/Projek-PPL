    <?php
    // Koneksi ke database
    $konek = mysqli_connect("localhost","root","","db_absensi");
    // Ambil variabel yang dikirim dari form
    $kode_kelas = $_POST['kode_kelas'];
    $kelas = $_POST['kelas'];
	
    // Query Input Data
    $input = "INSERT INTO kelas(kode_kelas, kelas) VALUES ('$kode_kelas','$kelas')";
    $hasil = mysqli_query($konek,$input);
    // Apabila query untuk menginput data benar
    if($hasil){
			echo '<script language="javascript">
				  alert ("Data Kelas Berhasil Diinput");
				  window.location="kelas_data.php";
				  </script>';
				  exit();
	}
    else {
			echo '<script language="javascript">
				  alert ("Data Kelas Gagal Diinput");
				  window.location="kelas_data.php";
				  </script>';
				  exit();
    }
    ?>
	
	
	
	
	
	