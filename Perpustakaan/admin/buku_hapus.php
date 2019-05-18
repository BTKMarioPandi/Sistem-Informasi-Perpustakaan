
<?php
include "configdb.php";

$queri = "DELETE FROM buku WHERE buku_kode='$_GET[id]'";
mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:buku.php');

?>