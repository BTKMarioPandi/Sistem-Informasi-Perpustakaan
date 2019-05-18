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
    $queri = "SELECT * FROM kartu_pendaftaran WHERE kartu_barkode='$_GET[id]'";
        $hasil = mysqli_query($koneksi , $queri); 
        $kolom = mysqli_fetch_assoc($hasil);
        $tgll=$kolom['kartu_tgl_pembuatan'];
        $pctgl=explode("-",$tgll);
        $thn=$pctgl[0];
        $bln=$pctgl[1];
        $tgl=$pctgl[2];
        $tgllkem=$kolom['kartu_tgl_akhir'];
        $pctglkem=explode("-",$tgllkem);
        $thna=$pctglkem[0];
        $blna=$pctglkem[1];
        $tgla=$pctglkem[2];

 ?>
 <div class="container">
        <h2>EDIT DATA PENDAFTAR</h2>
        <br><br>
        <form method="post" action="pendaftaran_edit_proses.php">
            <div class="form-group row">
                  <div class="col-xs-3">
                    <label for="exl">Kartu Barkode</label>
                    <input type="text" value="<?php echo  "$kolom[kartu_barkode]"; ?>" class="form-control" name="kartu_barkode">
                  </div>
                  <div class="col-xs-3">
                    <label for="ex2">Kode Petugas</label>
                    <select name="kode_petugas" value="<?php echo  "$kolom[petugas_kode]"; ?>" class="form-control">
                    <?php
                        $queri="SELECT * FROM petugas";
                        $hasil=mysqli_query($koneksi,$queri);
                        while ($k=mysqli_fetch_assoc($hasil))
                        {
                            echo "<option value='$k[petugas_kode]'>$k[petugas_kode] | $k[petugas_nama]</option>";
                        }
                    ?>
                    </select>
                  </div>
                  <div class="col-xs-3">
                    <label for="ex2">Kode Peminjam</label>
                    <select class="form-control" value="<?php echo  "$kolom[peminjam_kode]"; ?>" name="kode_peminjam">
                        <?php
                        $queri="SELECT * FROM peminjam";
                        $hasil=mysqli_query($koneksi,$queri);
                        while ($p=mysqli_fetch_assoc($hasil))
                        {
                            echo "<option value='$p[peminjam_kode]'>$p[peminjam_kode] | $p[peminjam_nama]</option>";
                        }
                    ?>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
              <div class="col-xs-3">
                    <label for="ex2">Kartu Tanggal Pembuatan</label>
                </div>
            </div>
                <div class="form-group row">
                    <div class="col-xs-3">
                    <select class="form-control"  id="tanggal_buat" name="tanggal_buat">
                        <option> <?php echo "$tgl" ?></option>
                        <?php
                            for ($a=1;$a<=31;$a++)
                                {echo "<option>$a</option>";}
                        ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="bulan_buat" name="bulan_buat">
                        <option><?php echo "$bln" ?></option>
                        <?php
                            for ($b=1;$b<=12;$b++)
                                {echo "<option>$b</option>";}
                        ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="tahun_buat" name="tahun_buat">
                        <option><?php echo "$thn" ?></option>
                        <?php
                            for ($i=2019;$i>=1970;$i--)
                                {echo "<option>$i</option>";}
                        ?>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-3">
                    <label for="ex2">Kartu Tanggal Akhir</label>
                </div>
            </div>
                <div class="col-xs-3">
                    <select class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                        <option><?php echo "$tgla" ?></option>
                        <?php
                            for ($a=1;$a<=31;$a++)
                                {echo "<option>$a</option>";}
                        ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="bulan_akhir" name="bulan_akhir">
                        <option><?php echo "$blna" ?></option>
                        <?php
                            for ($b=1;$b<=12;$b++)
                                {echo "<option>$b</option>";}
                        ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="tahun_akhir" name="tahun_akhir">
                        <option><?php echo "$thna" ?></option>
                        <?php
                            for ($i=2019;$i>=1970;$i--)
                                {echo "<option>$i</option>";}
                        ?>
                    </select>
                  </div>
              </div>
      </div>
      </div>
			
				<button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
				<button type="reset" class="btn btn-sm btn-warning">RESET</button>
		</form>
			
	</div>

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