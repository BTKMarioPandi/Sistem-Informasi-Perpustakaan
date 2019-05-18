<?php
include 'configdb.php';

$deletfile = "SELECT * FROM peminjam WHERE peminjam_kode='$_POST[kode_peminjam]'";
$hasil=mysqli_query($koneksi, $deletfile);
$kolom= mysqli_fetch_assoc($hasil);
$namaft = $kolom[peminjam_foto];


	$namafoto = $_FILES['gambar']['name'];
	$folderawal = $_FILES['gambar']['tmp_name'];
	$foldertujuan="foto/";


if (!empty($folderawal))
	{

	unlink('foto/'.$namaft);
	move_uploaded_file($folderawal,$foldertujuan.$namafoto);
	$queri="UPDATE peminjam SET
			peminjam_nama='$_POST[nama_peminjam]',
			peminjam_alamat='$_POST[alamat]',
			peminjam_telp='$_POST[telp]',
			peminjam_foto='$namafoto'
			WHERE peminjam_kode='$_POST[kode_peminjam]'";

	}else{
		$queri="UPDATE peminjam SET
			peminjam_nama='$_POST[nama_peminjam]',
			peminjam_alamat='$_POST[alamat]',
			peminjam_telp='$_POST[telp]'
			WHERE peminjam_kode='$_POST[kode_peminjam]'";
	}

mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:peminjam.php');	
?>