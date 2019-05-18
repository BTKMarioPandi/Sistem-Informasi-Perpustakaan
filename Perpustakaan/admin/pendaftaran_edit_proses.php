<?php
include 'configdb.php';

$tglbuat=$_POST['tahun_buat'].'-'.$_POST['bulan_buat'].'-'.$_POST['tanggal_buat'];
$tglakhir=$_POST['tahun_akhir'].'-'.$_POST['bulan_akhir'].'-'.$_POST['tanggal_akhir'];

$tglbuat3=$_POST['tahun_buat'];
$tglbuat2=$_POST['bulan_buat'];
$tglbuat1=$_POST['tanggal_buat'];
$tglakhir3=$_POST['tahun_akhir'];
$tglakhir2=$_POST['bulan_akhir'];
$tglakhir1=$_POST['tanggal_akhir'];

$tglbuatan=$tglbuat3+$tglbuat2+$tglbuat1;
$tglakhiran=$tglakhir3+$tglakhir2+$tglakhir1;
if ($tglbuatan<$tglakhiran) {
	$status=1;
}else{ $status=0;}

	$queri="UPDATE kartu_pendaftaran SET
	petugas_kode 		= '$_POST[kode_petugas]',
	peminjam_kode 		= '$_POST[kode_peminjam]',
	kartu_tgl_pembuatan = '$tglbuat',
	kartu_tgl_akhir		= '$tglakhir',
	kartu_status_aktif	= '$status' 
	WHERE kartu_barkode = '$_POST[kartu_barkode]' ";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:pendaftaran.php');
?>