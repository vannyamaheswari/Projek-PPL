<?php
// pemanggilan file koneksi
include "koneksi.php";
// pembuatan variabel pada penginputan username dan password
$username = $_POST['username'];
$password = $_POST['password'];

// Pengecekan user id dan password dengan yang ada di database
$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
$ketemu = mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($ketemu > 0) {
session_start ();

	$_SESSION[username] = $r[username];
	$_SESSION[password] = $r[password];
	$_SESSION[leveladmin]= $r[level];
	
	header('location:beranda.php');
	
}
else {
			echo '<script language="javascript">
				  alert ("Anda Gagal Login");
				  window.location="index.php";
				  </script>';
				  exit();
	}
?>