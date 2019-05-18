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

    <title>PUSTAKA AMIK | Data Kategori</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

    <?php
    include "configdb.php"; 
    include "navbar.php";
    ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Kategori</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Kategori</strong>
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
                        <h5>Daftar Kategori</h5>
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
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                     <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                      <span class="glyphicon glyphicon-plus"> Tambah Data</span></a>
                    </button>
                    <tbody>
                    <?php
                        $queri = "SELECT * FROM kategori";
                        $hasil = mysqli_query($koneksi,$queri);
                        $no=1;
                        while($kolom=mysqli_fetch_assoc($hasil))
                        { 
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$kolom[kategori_kode]</td>
                                    <td>$kolom[kategori_nama]</td>
                                    <td width='80px'><a href='kategori_edit.php?id=$kolom[kategori_kode]'class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='kategori_hapus.php?id=$kolom[kategori_kode]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a> </td>
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

<?php include 'footer.php';  ?>   
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'DataKategori'},
                    {extend: 'pdf', title: 'DataKategori'},

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">   INPUT DATA KATEGORI</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <form method="post" action="kategori_add_proses.php">
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">Kode Kategori</label>
                        <input type="text" class="form-control" id="kode_kategori" placeholder="Kode Kategori" name="kode_kategori">
                </div>
                <div class="col-xs-3">
                    <label for="ex2">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" placeholder="Nama Kategori" name="nama_kategori">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>
</html>
 <?php
    }
    ?>
