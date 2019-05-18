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
  $queri = "SELECT * FROM petugas WHERE petugas_kode='$_GET[id]'";
    $hasil = mysqli_query($koneksi,$queri);
    $kolom=mysqli_fetch_assoc($hasil);
 ?>
 <section class="table-responsive">
 <div class="container">
        <h3>EDIT DATA PETUGAS</h3>
        <br><br>
        <form enctype="multipart/form-data"  method="post" action="petugas_edit_proses.php">
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">Kode Petugas</label>
                        <input type="text" class="form-control" value="<?php echo "$kolom[petugas_kode]"; ?>" name="kode_petugas" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="ex2">Nama Petugas</label>
                        <input type="text" class="form-control" value="<?php echo "$kolom[petugas_nama]"; ?>" placeholder="Nama Petugas" name="nama_petugas" required/>
                </div>
                <div class="col-xs-3">
                    <label for="ex2">Password</label>
                        <input type="password" class="form-control"  placeholder="Password" name="password" required/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">Role</label>
                    <select name="role" class="form-control">
                        <optionvalue="<?php echo "$kolom[role]"; ?>"><?php echo "$kolom[role]"; ?></option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="ex1">Foto</label>
                        <input type="file" class="form-control"  name="gambar">
                </div>
                <div class="col-xs-2">
                    <img  src="foto/admin/<?php echo "$kolom[foto]"; ?>" width="150px">
                </div>
            </div>
            <div class="form-group row">
            <button type="submit" class="btn btn-primary ">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            </div>
    </div>
    </form>
</section>
	<div class="footer">
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