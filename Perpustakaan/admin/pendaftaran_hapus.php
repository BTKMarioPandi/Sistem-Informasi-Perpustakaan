
<?php
include "configdb.php";

$queri = "DELETE FROM kartu_pendaftaran WHERE kartu_barkode='$_GET[id]'";
mysqli_query($koneksi, $queri); 
mysqli_close($koneksi);
header('location:pendaftaran.php');

?>