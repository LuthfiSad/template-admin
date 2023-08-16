<?php 

$server = "localhost"; 
$user = "root"; 
$pw = ""; 
$database = "pendaftaran_siswa";

//melakukan koneksi ke database
$db = mysqli_connect($server, $user, $pw, $database) or die ('koneksi gagal');

//cek koneksi yang kita lakukan berhasil atau tidak


?>