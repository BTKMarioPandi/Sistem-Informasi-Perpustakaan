<?php
include 'configdb.php';

$tglpinjam=$_POST['thn_pinjam'].'-'.$_POST['bulan_pinjam'].'-'.$_POST['tgl_pinjam'];
$tglkembali=$_POST['thn_kembali'].'-'.$_POST['bulan_kembali'].'-'.$_POST['tgl_kembali'];

$queri="INSERT INTO peminjaman
(peminjaman_kode,
petugas_kode,
peminjam_kode,
peminjaman_tgl,
peminjaman_tgl_hrs_kembali) 
VALUES 
('$_POST[kode_peminjaman]',
'$_POST[kode_petugas]',
'$_POST[kode_peminjam]',
'$tglpinjam',
'$tglkembali')";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:peminjaman.php');
?>