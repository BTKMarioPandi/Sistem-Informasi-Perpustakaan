<?php
include 'configdb.php';
$koneksi=mysqli_connect($namaserver,$userdb,$passdb,$namadb);
$queri="INSERT INTO penerbit
(penerbit_kode,
penerbit_nama,
penerbit_alamat,
penerbit_telp) 
VALUES 
('$_POST[kode_penerbit]',
'$_POST[nama_penerbit]',
'$_POST[alamat_penerbit]',
'$_POST[telp_penerbit]')";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:penerbit.php');
?>