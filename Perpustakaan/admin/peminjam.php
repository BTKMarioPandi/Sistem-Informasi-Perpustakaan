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

    <title>PUSTAKA AMIK | Data Peminjam</title>

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
                    <h2>Data Peminjam</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Peminjam</strong>
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
                        <h5>Daftar Peminjam</h5>
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
                        <th> Kode Peminjam</th>
                        <th>Nama Peminjam</th>
                        <th>Alamat Peminjam</th>
                        <th>Telp Peminjam</th>
                        <th>Foto Peminjam</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
					  <span class='glyphicon glyphicon-plus'> Tambah Data</span>
					</button>
                    <tbody>
                    <?php
                        $queri = "SELECT * FROM peminjam";
                        $hasil = mysqli_query($koneksi,$queri);
                        $no=1;
                        while($kolom=mysqli_fetch_assoc($hasil))
                        {
                            
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$kolom[peminjam_kode]</td>
                                    <td>$kolom[peminjam_nama]</td>
                                    <td>$kolom[peminjam_alamat]</td>
                                    <td>$kolom[peminjam_telp]</td>
                                    <td><img src='foto/$kolom[peminjam_foto]' width='150px'></td>
                                    <td width='80px'><a href='peminjam_edit.php?id=$kolom[peminjam_kode]'class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='peminjam_hapus.php?id=$kolom[peminjam_kode]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a> </td>
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
<<?php include 'footer.php'; ?>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'DataPeminjam'},
                    {extend: 'pdf', title: 'DataPeminjam'},

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-success">
        <h2 class="modal-title" id="exampleModalLabel">Tambah Data PEMINJAM</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
    <h3>INPUT DATA PEMINJAM</h3>
        <form enctype="multipart/form-data" action="peminjam_add_proses.php" method="POST">
            <div class="form-group row">
                <div class="col-xs-6">
                    <label for="ex1">Kode Peminjam</label>
                        <input type="text" class="form-control" id="kode_peminjam" placeholder="Enter kode member" name="kode_peminjam">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <label for="ex1">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" placeholder="Enter nama" name="nama_peminjam">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <label for="ex1">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Enter alamat" name="alamat">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <label for="ex1">No Telpon</label>
                        <input type="text" class="form-control" id="telp" placeholder="Enter no telepon" name="telp">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <label for="ex1">Foto</label>
                        <input type="file" class="form-control" name="gambar">
                </div>
            </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
</html>
<?php } ?>