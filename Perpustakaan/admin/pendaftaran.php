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
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PUSTAKA AMIK | Data Pendaftaran</title>

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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Pendaftaran</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Pendaftaran</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Pendaftaran</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">


                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    
                    <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th> Kartu Barcode</th>
                        <th> Kode Petugas</th>
                        <th> Kode Peminjam</th>
                        <th> Tanggal Buat</th>
                        <th> Tanggal Expired</th>
                        <th> Status</th>
                        <th> Aksi</th>
                    </tr>
                    </thead>
                    <!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
					  <span class='glyphicon glyphicon-plus'> Tambah Data</span>
					</button>
                    <tbody>
                    <?php
                        $queri = "SELECT * FROM kartu_pendaftaran";
                        $hasil = mysqli_query($koneksi,$queri);
                        $no=1;
                        while($kolom=mysqli_fetch_assoc($hasil))
                        {

                            $queripetugas="SELECT * FROM petugas where petugas_kode='$kolom[petugas_kode]'";
                            $hasilpetugas=mysqli_query($koneksi,$queripetugas);
                            $x=mysqli_fetch_assoc($hasilpetugas);

                            $peminjam="SELECT * FROM peminjam where peminjam_kode='$kolom[peminjam_kode]'";
                            $hasilpeminjam=mysqli_query($koneksi,$peminjam);
                            $y=mysqli_fetch_assoc($hasilpeminjam);
                            
                            $tb=$kolom['kartu_status_aktif'];
                             $hs=0;
                             if ($tb>0) {
                                 $stat="Berlaku";}
                            else
                            {$stat="Tidak Berlaku";}

                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$kolom[kartu_barkode]</td>
                                    <td>$x[petugas_nama]</td>
                                    <td>$y[peminjam_nama]</td>
                                    <td>$kolom[kartu_tgl_pembuatan]</td>
                                    <td>$kolom[kartu_tgl_akhir]</td>
                                    <td>$stat</td>
                                    <td width='80px'><a href='pendaftaran_edit.php?id=$kolom[kartu_barkode]'class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='pendaftaran_hapus.php?id=$kolom[kartu_barkode]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a> </td>
                                </tr>
                                ";
                                $no=$no+1;
                        }
                        mysqli_close($koneksi);
                    ?>
			</tbody>
    </table>
                </div>
            </div>
        </div>
     </div>
     </div>
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
<?php
include "configdb.php"; 
?>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header alert-success">
        <h2 class="modal-title" id="exampleModalLabel">Tambah Data Pendaftaran</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
		<form method="post" action="pendaftaran_add_proses.php">
			<div class="form-group row">
                  <div class="col-xs-3">
                    <label for="exl">Kartu Barkode</label>
                    <input type="text" class="form-control" name="kartu_barkode">
                  </div>
                  <div class="col-xs-3">
                    <label for="ex2">Kode Petugas</label>
                    <select name="kode_petugas" class="form-control">
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
                    <select class="form-control" name="kode_peminjam">
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
                    <select class="form-control" id="tanggal_buat" name="tanggal_buat">
                        <option>--Pilih Tanggal--</option>
                        <?php
                            for ($a=1;$a<=31;$a++)
                                {echo "<option>$a</option>";}
                        ?>
                    </select>
                    </div>
                    <div class="col-xs-3">
                    <select class="form-control" id="bulan_buat" name="bulan_buat">
                        <option>--Pilih Bulan--</option>
                        <?php
                            for ($b=1;$b<=12;$b++)
                                {echo "<option>$b</option>";}
                        ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="tahun_buat" name="tahun_buat">
                        <option>-- Pilih Tahun--</option>
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
            <div class="form-group row">
                    <div class="col-xs-3">
                    <select class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                        <option>--Pilih Tanggal--</option>
                        <?php
                            for ($a=1;$a<=31;$a++)
                                {echo "<option>$a</option>";}
                        ?>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="bulan_akhir" name="bulan_akhir">
                        <option>--Pilih Bulan--</option>
                        <?php
                            for ($b=1;$b<=12;$b++)
                                {echo "<option>$b</option>";}
                        ?>
                    </select>
                </div>
                    <div class="col-xs-3">
                    <select class="form-control" id="tahun_akhir" name="tahun_akhir">
                        <option>-- Pilih Tahun--</option>
                        <?php
                            for ($i=2019;$i>=1970;$i--)
                                {echo "<option>$i</option>";}
                        ?>
                    </select>
                  </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="tambah" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit"  class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php 
 }
 ?>