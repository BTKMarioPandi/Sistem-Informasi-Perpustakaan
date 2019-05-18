<?php
include 'configdb.php';

$tglpinjam=$_POST[thn_pinjam].'-'.$_POST[bulan_pinjam].'-'.$_POST[tgl_pinjam];
$tglkembali=$_POST[thn_kembali].'-'.$_POST[bulan_kembali].'-'.$_POST[tgl_kembali];

$queri ="UPDATE peminjaman SET 
				petugas_kode='$_POST[kode_petugas]',
				peminjam_kode='$_POST[kode_peminjam]',
				peminjaman_tgl='$tglpinjam',
				peminjaman_tgl_hrs_kembali='$tglkembali' WHERE peminjaman_kode='$_POST[kode_peminjaman]'";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:peminjaman.php');
?>