<?php
include 'configdb.php';

	$namafoto = $_FILES['gambar']['name'];
	$folderawal = $_FILES['gambar']['tmp_name'];
	$foldertujuan="foto/";
	move_uploaded_file($folderawal,$foldertujuan.$namafoto);
	
		
	$queri="INSERT INTO peminjam
			(peminjam_kode,
			peminjam_nama,
			peminjam_alamat,
			peminjam_telp,
			peminjam_foto) 
			VALUES 
			('$_POST[kode_peminjam]',
			'$_POST[nama_peminjam]',
			'$_POST[alamat]',
			'$_POST[telp]',
			'$namafoto')";

mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:peminjam.php');
?>