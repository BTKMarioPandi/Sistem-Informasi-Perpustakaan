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
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PUSTAKA AMIK | Data Petugas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

    <?php
    include "navbar.php";
    ?>

<?php
    include 'configdb.php';
  $queri = "SELECT * FROM peminjam WHERE peminjam_kode='$_GET[id]'";
    $hasil = mysqli_query($koneksi,$queri);
    $kolom=mysqli_fetch_assoc($hasil);
 ?>
 <section class="wrapper wrapper-content">
<div class="container">
    <h2>Edit Data Peminjam</h2>
        <form enctype="multipart/form-data" action="peminjam_edit_proses.php" method="POST">
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="ex1">Kode Peminjam</label>
                        <input type="text" class="form-control" id="kode_member" value="<?php echo "$kolom[peminjam_kode]" ?>" readonly name="kode_peminjam">
                </div>
                <div class="col-xs-4">
                    <label for="ex1">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_member" value="<?php echo "$kolom[peminjam_nama]" ?>" name="nama_peminjam">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-7">
                    <label for="ex1">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?php echo "$kolom[peminjam_alamat]" ?>" name="alamat">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-4">
                    <label for="ex1">No Telpon</label>
                        <input type="text" class="form-control" id="telpn" value="<?php echo "$kolom[peminjam_telp]" ?>" name="telp">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="ex1">Foto</label>
                        <input type="file" class="form-control" id="gambar"  name="gambar">
                </div>
                <div class="col-xs-3">
                    <img src='<?php echo "foto/$kolom[peminjam_foto]"; ?>'  width='150px'>
                </div>
            </div>
            <button  type="submit" class="btn btn-primary">SIMPAN</button>
            <button  type="reset"   class="btn btn-warning">RESET</button>
        </form>
    </div>
</section>
    <div class="footer ">
        <div class="pull-right">
             10GB of <strong>250GB</strong> Free.
        </div>
        <div>
            <strong>Copyright</strong> Perpus Amik &copy; 2019
        </div>
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
<?php } ?>