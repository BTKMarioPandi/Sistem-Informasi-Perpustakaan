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

$tglbuatan=$tglbuat3.$tglbuat2.$tglbuat1;
$tglakhiran=$tglakhir3.$tglakhir2.$tglakhir1;
if ($tglbuatan<$tglakhiran) {
	$status=1;
	$queri="INSERT INTO kartu_pendaftaran
	(kartu_barkode,
	petugas_kode,
	peminjam_kode,
	kartu_tgl_pembuatan,
	kartu_tgl_akhir,
	kartu_status_aktif) 
	VALUES 
	('$_POST[kartu_barkode]',
	'$_POST[kode_petugas]',
	'$_POST[kode_peminjam]',
	'$tglbuat',
	'$tglakhir',
	'$status')";
	mysqli_query($koneksi,$queri);
	mysqli_close($koneksi);
	header('location:pendaftaran.php');
}else{ 
	$status=0;
	echo "<script language='javascript'>alert('Data Tanggal Tidak Valid<br>Periksa Kembali Tanggal Yang Anda Input');location.replace('pendaftaran.php')</script>";
}

?>