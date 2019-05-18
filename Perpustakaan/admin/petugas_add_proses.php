<?php
include 'configdb.php';

	$namafoto = $_FILES['gambar']['name'];
	$folderawal = $_FILES['gambar']['tmp_name'];
	$foldertujuan="foto/admin/";
	move_uploaded_file($folderawal,$foldertujuan.$namafoto);

$password=md5($_POST['password']);

$queri="INSERT INTO petugas
(petugas_kode,
petugas_nama,
password,
role,
foto) 
VALUES 
('$_POST[kode_petugas]',
'$_POST[nama_petugas]',
'$password',
'$_POST[role]',
'$namafoto')";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:petugas.php');
?>