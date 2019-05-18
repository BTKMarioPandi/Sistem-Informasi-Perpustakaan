<?php
include 'configdb.php';

$deletfile = "SELECT * FROM petugas WHERE petugas_kode='$_POST[kode_petugas]'";
$hasil=mysqli_query($koneksi, $deletfile);
$kolom= mysqli_fetch_assoc($hasil);
$namaft = $kolom[foto];

$password=md5($_POST['password']);

	$namafoto = $_FILES['gambar']['name'];
	$folderawal = $_FILES['gambar']['tmp_name'];
	$foldertujuan="foto/admin/";


if (!empty($folderawal))
	{

	unlink('foto/admin/'.$namaft);
	move_uploaded_file($folderawal,$foldertujuan.$namafoto);
	$queri="UPDATE petugas SET
			petugas_nama='$_POST[nama_petugas]',
			password='$password',
			role='$_POST[role]',
			foto='$namafoto'
			WHERE petugas_kode='$_POST[kode_petugas]'";

	}else{
		$queri="UPDATE petugas SET
				petugas_nama='$_POST[nama_petugas]',
				password='$password',
				role='$_POST[role]'
				WHERE petugas_kode='$_POST[kode_petugas]'";
	}

mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:petugas.php');	
?>