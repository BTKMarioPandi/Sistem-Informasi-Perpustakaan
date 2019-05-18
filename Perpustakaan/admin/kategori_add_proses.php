<?php
$namaserver="localhost";
$userdb="root";
$passdb="";
$namadb="perpustakaan";
$koneksi=mysqli_connect($namaserver,$userdb,$passdb,$namadb);
$queri="INSERT INTO kategori
(kategori_kode,
kategori_nama) 
VALUES 
('$_POST[kode_kategori]',
'$_POST[nama_kategori]')";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:kategori.php');
?>