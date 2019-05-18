<?php
 if (!isset($_SESSION)) {
        session_start();
    }
    if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
        include '404.php';
    }
    else
    {

?>
<?php
include "configdb.php"; 
$queri = "SELECT * FROM buku WHERE buku_kode='$_GET[id]'";
$hasil = mysqli_query($koneksi,$queri);
$kolom=mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PUSTAKA AMIK | Data Buku</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

    <?php
    include "navbar.php"
    ?>
<div class="wrapper wrapper-content">
	<h2>INPUT DATA BUKU</h2>
		<form method="post" action="buku_edit_proses.php">
			<div class="form-group row">
				<div class="col-xs-2">
					<label for="ex1">Kode Buku</label>
						<input type="text" class="form-control" id="kode" value="<?php echo "$kolom[buku_kode]"; ?>" readonly name="kode">
				</div>
				<div class="col-xs-2">
					<label for="ex2">Kode Kategori</label>
						<select class="form-control" id="kode_kategori" name="kode_kategori"  ><option ><?php echo "$kolom[kategori_kode]"; ?></option>
						<?php
							$queri = "SELECT * FROM kategori";
						    $hasil = mysqli_query($koneksi, $queri);
							while($x=mysqli_fetch_assoc($hasil))
								{ echo "<option value='$x[kategori_kode]'>$x[kategori_kode] | $x[kategori_nama] </option>"; }
						?>
						</select>
				</div>
				<div class="col-xs-2">
					<label for ="ex1">Kode Penerbit</label>
						<select class="form-control" id="kode_penerbit" name="kode_penerbit"><option><?php echo "$kolom[penerbit_kode]"; ?></option>
						<?php
							$queri = "SELECT * FROM penerbit";
						    $hasil = mysqli_query($koneksi, $queri);
							while($penerbit=mysqli_fetch_assoc($hasil))
								{ echo "<option value='$penerbit[penerbit_kode]'> $penerbit[penerbit_kode] | $penerbit[penerbit_nama]</option>"; }
						?>
						</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-6">
					<label for ="ex1">Judul Buku</label>
						<input type="text" class="form-control" id="judul" value="<?php echo "$kolom[buku_judul]"; ?>" name="judul">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-3">
					<label for ="ex1">Jumlah</label>
						<input type="text" class="form-control" id="jumlah" value="<?php echo "$kolom[buku_jumhal]"; ?>" name="jumlah" >
				</div>
				<div class="col-xs-3">
					<label for ="ex2">Tahun</label>
						<select class="form-control" id="tahun" name="tahun"><option><?php echo "$kolom[buku_thn_terbit]"; ?></option>
						<?php
							for ($i=2018;$i>=1970;$i--)
								{echo "<option>$i</option>";}
						?>
						</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-6">
					<label for ="ex1">Pengarang</label>
						<input type="text" class="form-control" id="pengarang" value="<?php echo "$kolom[buku_pengarang]"; ?>" name="pengarang">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-6">
					<label for ="ex1">Deskripsi</label>
						<input type="text" class="form-control" id="diskripsi" value="<?php echo "$kolom[buku_diskripsi]"; ?>" name="diskripsi">
				</div>
			</div>
					<button type="submit" class="btn btn-primary">SIMPAN</button>
					<button type="reset" class="btn btn-danger">RESET</button>
				
		</form>
</div>
  <!-- Mainly scripts -->
  <?php include 'footer.php'; ?>

</body>

</html>
<?php
}
?>

	
