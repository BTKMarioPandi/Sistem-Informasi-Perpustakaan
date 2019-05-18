
<?php
include "configdb.php";

$queri = "DELETE FROM kategori WHERE kategori_kode='$_GET[id]'";
mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:kategori.php');

?>