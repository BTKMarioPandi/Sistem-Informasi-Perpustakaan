
<?php
include "configdb.php";

$queri = "DELETE FROM penerbit WHERE penerbit_kode='$_GET[id]'";
mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:penerbit.php');

?>