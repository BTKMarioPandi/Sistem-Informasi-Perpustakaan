<?php
include 'configdb.php';

$queri="UPDATE penerbit SET
						penerbit_nama='$_POST[nama_penerbit]',
						penerbit_alamat='$_POST[alamat_penerbit]',
						penerbit_telp='$_POST[telp_penerbit]'
						WHERE penerbit_kode='$_POST[kode_penerbit]'";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:penerbit.php');	

?>