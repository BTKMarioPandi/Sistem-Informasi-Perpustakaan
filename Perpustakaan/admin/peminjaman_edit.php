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

    <title>PUSTAKA AMIK | Data Peminjaman</title>

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
	$queri = "SELECT * FROM peminjaman WHERE peminjaman_kode='$_GET[id]'";
        $hasil = mysqli_query($koneksi , $queri); 
        $kolom = mysqli_fetch_assoc($hasil);
        $tgll=$kolom['peminjaman_tgl'];
        $pctgl=explode("-",$tgll);
        $thn=$pctgl[0];
        $bln=$pctgl[1];
        $tgl=$pctgl[2];
        $tgllkem=$kolom['peminjaman_tgl_hrs_kembali'];
        $pctglkem=explode("-",$tgllkem);
        $thna=$pctglkem[0];
        $blna=$pctglkem[1];
        $tgla=$pctglkem[2];

 ?>
 <div class="container">
    <h2>EDIT DATA PEMINJAMAN</h2>
    <form enctype="multipart?from_data" action="peminjaman_edit_proses.php" method="POST">
      <div class="form-group row">
            <div class="col-xs-2">
                <label for="ex1">Kode Peminjaman</label>
                    <input type="text" class="form-control" id="kode_peminjaman" value="<?php echo "$kolom[peminjaman_kode]"; ?>" readonly name="kode_peminjaman">
            </div>
            <div class="col-xs-2">
                <label for="ex2">Kode Petugas</label>
                    <select class="form-control" id="kode_petugas" name="kode_petugas"><option><?php echo "$kolom[petugas_kode]" ?></option>
                        <?php
                            $queri = "SELECT * FROM petugas";
                            $hasil = mysqli_query($koneksi, $queri);
                            while($pt=mysqli_fetch_assoc($hasil))
                                { echo "<option value='$pt[petugas_kode]'> $pt[petugas_kode] || $pt[petugas_nama]</option>"; }
                        ?>
                        </select>
            </div>
            <div class="col-xs-2">
                <label for="ex3">Kode Peminjam</label>
                    <select class="form-control" id="kode_peminjam" name="kode_peminjam"><option><?php echo "$kolom[peminjam_kode]" ?></option>
                        <?php
                            $queri = "SELECT * FROM peminjam";
                            $hasil = mysqli_query($koneksi, $queri);
                            while($mem=mysqli_fetch_assoc($hasil))
                                { echo "<option value='$mem[peminjam_kode]'> $mem[peminjam_kode] || $mem[peminjam_nama]</option>"; }
                        ?>
                        </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-6">
                <label for="ex1">Tanggal Peminjaman</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-2">
                <select class="form-control" id="tgl_pinjam" name="tgl_pinjam"><option><?php echo "$tgl" ?></option>
                        <?php
                            for ($tgl=1;$tg<=31;$tg++)
                                {echo "<option>$tg</option>";}
                        ?>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="bulan_pinjam" name="bulan_pinjam"><option><?php echo "$bln" ?></option>
                            <?php
                                for ($bln=1;$bln<=12;$bln++)
                                    {echo "<option>$bln</option>";}
                            ?>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="thn_pinjam" name="thn_pinjam"><option><?php echo "$thn" ?></option>
                        <?php
                            for ($th=2018;$th>=1970;$th--)
                                {echo "<option>$th</option>";}
                        ?>
                </select>
            </div>
        </div>          
        <div class="form-group row">
            <div class="col-xs-6">
                <label for="ex1">Tanggal Pengembalian</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-2">
                <select class="form-control" id="tgl_kembali" name="tgl_kembali"><option><?php echo "$tgla" ?></option>
                        <?php
                            for ($i=1;$i<=31;$i++)
                                {echo "<option>$i</option>";}
                        ?>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="bulan_kembali" name="bulan_kembali"><option><?php echo "$blna" ?></option>
                            <?php
                                for ($bln=1;$bln<=12;$bln++)
                                    {echo "<option>$bln</option>";}
                            ?>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="thn_kembali" name="thn_kembali"><option><?php echo "$thna" ?></option>
                        <?php
                            for ($th=2018;$th>=1970;$th--)
                                {echo "<option>$th</option>";}
                        ?>
                </select>
            </div>
        </div>
    
                <button  type="submit" class="btn btn-primary" value="simpan">SIMPAN</button>
                <button type="resset" class="btn btn-warning">RESET</button>
                <button href='peminjaman_view.php' class='btn btn-danger'>KEMBALI</button> 
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
<?php } ?>