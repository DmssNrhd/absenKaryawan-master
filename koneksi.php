<?php 
$koneksi = mysqli_connect('127.0.0.1','root','','absenkaryawan');

if (!$koneksi) {
	die("Koneksi gagal: " . mysqli_connect_error());
}

?>