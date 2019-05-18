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

    <title>PUSTAKA AMIK | Data Buku</title>

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
                    <h2>Data Buku</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Buku</strong>
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
                        <h5>Daftar Detail Pinjam</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
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
                        <th>Kode Peminjaman</th>
                        <th>Kode Buku</th>
                        <th>Detail Tanggal Kembali</th>
                        <th>Detail Denda</th>
                        <th>Detail Status Kembali</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                     <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                       <span class="glyphicon glyphicon-plus"> Tambah data</span> </button>
                    <tbody>
                    <?php
                        $queri = "SELECT * FROM detail_pinjam";
                        $hasil = mysqli_query($koneksi,$queri);
                        $no=1;
                        while($kolom=mysqli_fetch_assoc($hasil))
                        {

                            $queribuku="SELECT * FROM buku where buku_kode='$kolom[buku_kode]'";
                            $hasilbuku=mysqli_query($koneksi,$queribuku);
                            $y=mysqli_fetch_assoc($hasilbuku);

                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$kolom[peminjaman_kode]</td>
                                    <td>$y[buku_judul]</td>
                                    <td>$kolom[detail_tgl_kembali]</td>
                                    <td>$kolom[detail_denda]</td>
                                    <td>$kolom[detail_status_kembali]</td>
                                    <td width='80px'><a href='detailpinjam_edit.php?id=$kolom[peminjaman_kode]'class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='detailpinjam_hapus.php?id=$kolom[peminjaman_kode]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a> </td>
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
    
    <?php include 'footer.php'; ?><!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'Detail Pinjam'},
                    {extend: 'pdf', title: 'Detail Pinjam'},

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
<!-- Button trigger modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<?php
include "configdb.php"; 
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Tambah Data Detail Pinjam</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="container">
	<form enctype="multipart/form-data"	action="detail_pinjam_add_proses.php" method="POST">
	  <div class="form-group row">
			 <div class="col-xs-2">
                <label for="ex3">Kode Peminjaman</label>
                    <select class="form-control" id="kode_peminjam" name="kode_peminjaman"><option>kode peminjaman</option>
                        <?php
                            $queripinjam = "SELECT * FROM peminjaman";
                            $hasilpinjam = mysqli_query($koneksi, $queripinjam);
                            while($p=mysqli_fetch_assoc($hasilpinjam))
                                { echo "<option value='$p[peminjaman_kode]'>$p[peminjaman_kode] </option>"; }
                        ?>
                        </select>
            </div>
			<div class="col-xs-2">
				<label for="ex3">Kode Buku</label>
					<select class="form-control" id="kode_peminjam" name="kode_buku"><option>Kode Buku</option>
						<?php
							$queri = "SELECT * FROM buku";
						    $hasil = mysqli_query($koneksi, $queri);
							while($y=mysqli_fetch_assoc($hasil))
								{ echo "<option value='$y[buku_kode]'>$y[buku_kode] | $y[buku_judul] </option>"; }
						?>
						</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-6">
				<label for="ex1">Detail Tanggal Kembali</label>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-2">
				<select class="form-control" id="tgl_pinjam" name="tgl_pinjam"><option>tanggal</option>
						<?php
							for ($tglb=1;$tglb<=31;$tglb++)
								{echo "<option value='$tglb'>$tglb</option>";}
						?>
					</select>
			</div>
			<div class="col-xs-2">
				<select class="form-control" id="bulan_pinjam" name="bulan_pinjam"><option>bulan</option>
							<?php
								for ($blnb=1;$blnb<=12;$blnb++)
									{echo "<option value='$blnb'>$blnb</option>";}
							?>
							</select>
			</div>
			<div class="col-xs-2">
				<select class="form-control" id="thn_pinjam" name="thn_pinjam"><option>Tahun</option>
						<?php
							for ($thnb=2019;$thnb>=1970;$thnb--)
								{echo "<option value='$thnb'>$thnb</option>";}
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
</html>
<?php
}
?>