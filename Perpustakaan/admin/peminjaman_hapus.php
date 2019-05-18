
<?php
include "configdb.php";

$queri = "DELETE FROM peminjaman WHERE peminjaman_kode='$_GET[id]'";
mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:peminjaman.php');

?>