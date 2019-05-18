<?php

include 'configdb.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql	 = "SELECT * FROM petugas WHERE petugas_nama='$username' AND password='$password' ";
$result  = mysqli_query($koneksi, $sql);
$ketemu  = mysqli_num_rows($result);
$r 		 = mysqli_fetch_assoc($result);
	if ($ketemu > 0)
	 {
	session_start();
	$_SESSION['username']	= $r['petugas_nama'];
	$_SESSION['password']	= $r['password'];
	$_SESSION['role']		= $r['role'];
	$_SESSION['foto']		= $r['foto'];

	echo "<script language='javascript'>alert('Selamat Anda berhasil Login');location.replace('home.php')</script>";
	}
	else {
echo "<script language='javascript'>alert('Maaf Username & Password Tidak Sesuai');location.replace('index.php')</script>";

	}

?>