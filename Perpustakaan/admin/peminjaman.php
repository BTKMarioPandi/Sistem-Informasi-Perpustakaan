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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Peminjaman</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Peminjaman</strong>
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
                        <h5>Daftar Peminjaman</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
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
                        <th>Kode<br>Peminjaman</th>
						<th >Kode Petugas</th>
						<th >Kode Peminjam</th>
						<th>Tanggal <br>Peminjaman </th>
						<th>Tanggal <br>Pengembalian </th>
						<th>AKSI</th>
                    </tr>
                    </thead>
                    <!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
					  <span class='glyphicon glyphicon-plus'> Tambah Data</span>
					</button>
                    <tbody>
                    <?php
                        $queri = "SELECT * FROM Peminjaman";
                        $hasil = mysqli_query($koneksi,$queri);
                        $no=1;
                        while($kolom=mysqli_fetch_assoc($hasil))
                        {
                            
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$kolom[peminjaman_kode]</td>
                                    <td>$kolom[petugas_kode]</td>
                                    <td>$kolom[peminjam_kode]</td>
                                    <td>$kolom[peminjaman_tgl]</td>
                                    <td>$kolom[peminjaman_tgl_hrs_kembali]</td>
                                    <td width='80px'><a href='peminjaman_edit.php?id=$kolom[peminjaman_kode]'class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='peminjaman_hapus.php?id=$kolom[peminjaman_kode]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a> </td>
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
include 'configdb.php'; ?>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-success">
        <h2 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
	<form enctype="multipart/form-data"	action="peminjaman_add_proses.php" method="POST">
	  <div class="form-group row">
			<div class="col-xs-2">
				<label for="ex1">Kode Peminjaman</label>
					<input type="text" class="form-control" id="kode_peminjaman" placeholder="Enter kode pinjaman" name="kode_peminjaman">
			</div>
			<div class="col-xs-2">
				<label for="ex2">Kode Petugas</label>
					<select class="form-control" id="kode_petugas" name="kode_petugas"><option>kode petugas</option>
						<?php
							$queri = "SELECT * FROM petugas";
						    $hasil = mysqli_query($koneksi, $queri);
							while($x=mysqli_fetch_assoc($hasil))
								{ echo "<option value='$x[petugas_kode]'>$x[petugas_kode] | $x[petugas_nama] </option>"; }
						?>
						</select>
			</div>
			<div class="col-xs-2">
				<label for="ex3">Kode Peminjam</label>
					<select class="form-control" id="kode_peminjam" name="kode_peminjam"><option>kode peminjam</option>
						<?php
							$queri = "SELECT * FROM peminjam";
						    $hasil = mysqli_query($koneksi, $queri);
							while($y=mysqli_fetch_assoc($hasil))
								{ echo "<option value='$y[peminjam_kode]'>$y[peminjam_kode] | $y[peminjam_nama] </option>"; }
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
				<select class="form-control" id="tgl_pinjam" name="tgl_pinjam"><option>tanggal</option>
						<?php
							for ($tglb=1;$tglb<=31;$tglb++)
								{echo "<option>$tglb</option>";}
						?>
					</select>
			</div>
			<div class="col-xs-2">
				<select class="form-control" id="bulan_pinjam" name="bulan_pinjam"><option>bulan</option>
							<?php
								for ($blnb=1;$blnb<=12;$blnb++)
									{echo "<option>$blnb</option>";}
							?>
							</select>
			</div>
			<div class="col-xs-2">
				<select class="form-control" id="thn_pinjam" name="thn_pinjam"><option>Tahun</option>
						<?php
							for ($thnb=2018;$thnb>=1970;$thnb--)
								{echo "<option>$thnb</option>";}
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
				<select class="form-control" id="tgl_kembali" name="tgl_kembali"><option>tanggal</option>
						<?php
							for ($i=1;$i<=31;$i++)
								{echo "<option>$i</option>";}
						?>
					</select>
			</div>
			<div class="col-xs-2">
				<select class="form-control" id="bulan_kembali" name="bulan_kembali"><option>bulan</option>
							<?php
								for ($bln=1;$bln<=12;$bln++)
									{echo "<option>$bln</option>";}
							?>
							</select>
			</div>
			<div class="col-xs-2">
				<select class="form-control" id="thn_kembali" name="thn_kembali"><option>Tahun</option>
						<?php
							for ($th=2018;$th>=1970;$th--)
								{echo "<option>$th</option>";}
						?>
						</select>
			</div>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit"  class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php 
}
?>