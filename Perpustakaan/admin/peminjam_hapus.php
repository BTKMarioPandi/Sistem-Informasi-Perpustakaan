
<?php
include "configdb.php";

$deletfile = "SELECT * FROM peminjam WHERE peminjam_kode='$_GET[id]'";
$hasil=mysqli_query($koneksi, $deletfile);
$kolom= mysqli_fetch_assoc($hasil);
$namafoto = $kolom[peminjam_foto];
unlink('foto/'.$namafoto);
$queri = "DELETE FROM peminjam WHERE peminjam_kode='$_GET[id]'";

mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:peminjam.php');

?>