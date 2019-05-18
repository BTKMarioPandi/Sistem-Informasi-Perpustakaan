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
$queri = "SELECT * FROM penerbit WHERE penerbit_kode='$_GET[id]'";
$hasil = mysqli_query($koneksi,$queri);
$kolom=mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PUSTAKA AMIK | Data Penerbit</title>

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
 <body>
<div class="container">
	<h2>INPUT DATA PENERBIT</h2>
		<form method="post" action="penerbit_edit_proses.php">
			<div class="form-group row">
				<div class="col-xs-2">
					<label for="ex1">Kode Penerbit</label>
						<input type="text" class="form-control" id="kode_penerbit" value="<?php echo "$kolom[penerbit_kode]"; ?>"  readonly placeholder="Enter kode buku" name="kode_penerbit">
				</div>
				<div class="col-xs-2">
					<label for="ex2">Nama Penerbit</label>
						<input type="text" class="form-control" id="nama_penerbit" value="<?php echo "$kolom[penerbit_nama]"; ?>" placeholder="Enter kode buku" name="nama_penerbit">

				</div>
			</div>
			<div class="form-group row
			">
				<div class="col-xs-3">
					<label for ="ex1">Alamat Penerbit</label>
						<input type="text" class="form-control" id="alamat_penerbit" value="<?php echo "$kolom[penerbit_alamat]"; ?>" placeholder="Enter Alamat Penerbit" name="alamat_penerbit">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-3">
					<label for ="ex1">Telp Penerbit</label>
						<input type="text" class="form-control" id="telp_penerbit" value="<?php echo "$kolom[penerbit_telp]"; ?>" placeholder="Enter Telp Penerbit" name="telp_penerbit" >
				</div>
			</div>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
				<button type="reset" class="btn btn-danger">RESET</button>
		</form>
			
	</div>

  <!-- Mainly scripts -->
  <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

</body>

</html>
<?php } ?>

	
