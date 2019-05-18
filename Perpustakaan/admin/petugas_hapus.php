
<?php
include "configdb.php";

$deletfile = "SELECT * FROM petugas WHERE petugas_kode='$_GET[id]'";
$hasil=mysqli_query($koneksi, $deletfile);
$kolom= mysqli_fetch_assoc($hasil);
$namafoto = $kolom[foto];
unlink('foto/admin/'.$namafoto);
$queri = "DELETE FROM petugas WHERE petugas_kode='$_GET[id]'";

mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:petugas.php');

?>