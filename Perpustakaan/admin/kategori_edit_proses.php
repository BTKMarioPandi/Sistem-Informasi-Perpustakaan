<?php
include "configdb.php";
$queri="UPDATE kategori SET
						kategori_nama='$_POST[nama_kategori]'
						WHERE kategori_kode='$_POST[kode_kategori]'";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:kategori.php');	

?>