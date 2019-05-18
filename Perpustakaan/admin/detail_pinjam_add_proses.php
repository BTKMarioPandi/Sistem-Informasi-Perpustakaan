<?php
include 'configdb.php';

$datapeminjaman="SELECT * FROM peminjaman where peminjaman_kode='$_POST[kode_peminjaman]'";
$hasilpeminjaman=mysqli_query($koneksi,$datapeminjaman);
$z=mysqli_fetch_assoc($hasilpeminjaman);

//$d=$_POST['tgl_pinjam'];
//$m=$_POST['bln_pinjam'];
//$y=$_POST['thn_pinjam'];

//$tgl=date(d-m-y);
//$pecah=explode("-", $tgl);

$kembali=$_POST['thn_pinjam'].'-'.$_POST['bulan_pinjam'].'-'.$_POST['tgl_pinjam'];


$tglstat=date('Y-m-d');
$tgldikembalikan=date('Y-m-d',strtotime($kembali));
$tglkembali=date('Y-m-d',strtotime($z['peminjaman_tgl_hrs_kembali']));
$haritelat=$tgldikembalikan->datediff($tglkembali);
$denda=0;
	

	if ($tgldikembalikan >= $tglstat)
	{
		$status="Sudah Dikembalikan";
	}
if ($tglkembali>=$tglstat) 
	{
		$denda=0;
		$status="Sudah Dikembalikan";
	}
else{
		$status="Sudah Dikembalikan";
	}
		
						
echo "
tglnov : $tglstat <br>
Tanggal Dikembalikan : $tgldikembalikan <br>
Tanggal janji : $tglkembali <br>
Status : $status <br> 
Lama Telat: $haritelat <br>
Denda : $denda";
die;

$queri="INSERT INTO detail_pinjam
(peminjaman_kode,
buku_kode,
detail_tgl_kembali,
detail_denda,
detail_status_kembali) 
VALUES 
('$_POST[kode_peminjaman]',
'$_POST[kode_buku]',
'$kembali',
'$denda',
'$status')";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:detail_pinjam.php');
?>