<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	echo "<script>alert('Login Dulu lah, Masa Langsung Log Out !!!');</script>";
	echo "<script>location='index.php';</script>";
	die();
}
session_destroy();
header('Location:../index.php');
?>
