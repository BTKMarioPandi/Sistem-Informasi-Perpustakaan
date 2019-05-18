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
$queri = "SELECT * FROM kategori WHERE kategori_kode='$_GET[id]'";
$hasil = mysqli_query($koneksi,$queri);
$kolom=mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PUSTAKA AMIK | Data Kategori</title>

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
	<h2>EDIT DATA KATEGORI</h2>
		<form method="post" action="kategori_edit_proses.php">
			<div class="form-group row">
				<div class="col-xs-2">
					<label for="ex1">Kode Kategori</label>
						<input type="text" value="<?php echo  "$kolom[kategori_kode]"; ?>" class="form-control" id="kode_kategori" readonly placeholder="Enter kode buku" name="kode_kategori" >
				</div>
				<div class="col-xs-2">
					<label for="ex2">Nama Kategori</label>
						<input type="text" class="form-control" value="<?php echo  "$kolom[kategori_nama]"; ?>" id="nama_kategori" placeholder="Enter kode buku" name="nama_kategori">
				</div>
			</div>
			
				<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
				<button type="reset" class="btn btn-danger btn-sm">RESET</button>
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
	
