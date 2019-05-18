<?php
include 'configdb.php';
$queri="UPDATE buku SET
						kategori_kode='$_POST[kode_kategori]',
						penerbit_kode='$_POST[kode_penerbit]',
						buku_judul='$_POST[judul]',
						buku_jumhal='$_POST[jumlah]',
						buku_diskripsi='$_POST[diskripsi]',
						buku_pengarang='$_POST[pengarang]',
						buku_thn_terbit='$_POST[tahun]'
						WHERE buku_kode='$_POST[kode]'";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:buku.php');	

?>