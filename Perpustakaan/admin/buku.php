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
                        <h5>Daftar Buku</h5>
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
                        <th>Buku Kode</th>
                        <th>Kode Kategori</th>
                        <th>Penerbit Kode</th>
                        <th>Judul Buku</th>
                        <th>Jumhal Buku</th>
                        <th>Deskripsi Buku</th>
                        <th>Pengarang Buku</th>
                        <th>Tahun Terbit Buku</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                     <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                       <span class="glyphicon glyphicon-plus"> Tambah Data</span> </button>
                    <tbody>
                    <?php
                        include "configdb.php"; 
                        $queri = "SELECT * FROM buku";
                        $hasil = mysqli_query($koneksi,$queri);
                        $no=1;
                        while($kolom=mysqli_fetch_assoc($hasil))
                        {
                            $querikategori="SELECT * FROM kategori where kategori_kode='$kolom[kategori_kode]'";
                            $hasilkategori=mysqli_query($koneksi,$querikategori);
                            $x=mysqli_fetch_assoc($hasilkategori);
                            
                            $queripenerbit="SELECT * FROM penerbit where penerbit_kode='$kolom[penerbit_kode]'";
                            $hasilpenerbit=mysqli_query($koneksi,$queripenerbit);
                            $y=mysqli_fetch_assoc($hasilpenerbit);
                            
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$kolom[buku_kode]</td>
                                    <td>$x[kategori_nama]</td>
                                    <td>$y[penerbit_nama]</td>
                                    <td>$kolom[buku_judul]</td>
                                    <td>$kolom[buku_jumhal]</td>
                                    <td>$kolom[buku_diskripsi]</td>
                                    <td>$kolom[buku_pengarang]</td>
                                    <td>$kolom[buku_thn_terbit]</td>
                                    <td width='80px'><a href='buku_edit.php?id=$kolom[buku_kode]'class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href='buku_hapus.php?id=$kolom[buku_kode]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a> </td>
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

    <?php include 'footer.php'; ?>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'DataBuku'},
                    {extend: 'pdf', title: 'DataBuku'},

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
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">INPUT DATA BUKU</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="container">
        <form method="post" action="buku_add_proses.php">
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">Kode Buku</label>
                        <input type="text" class="form-control" id="kode" placeholder="Kode Buku" name="kode">
                </div>
                <div class="col-xs-3">
                    <label for="ex2">Kode Kategori</label>
                        <select class="form-control" id="kode_kategori" name="kode_kategori"><option>Kode Kategori</option>
                        <?php
                            $queri = "SELECT * FROM kategori";
                            $hasil = mysqli_query($koneksi, $queri);
                            while($x=mysqli_fetch_assoc($hasil))
                                { echo "<option value='$x[kategori_kode]'>$x[kategori_kode] |$x[kategori_nama] </option>"; }
                        ?>
                        </select>
                </div>
                <div class="col-xs-3">
                    <label for ="ex1">Kode Penerbit</label>
                        <select class="form-control" id="kode_penerbit" name="kode_penerbit"><option>Kode Penerbit</option>
                        <?php
                            $queri = "SELECT * FROM penerbit";
                            $hasil = mysqli_query($koneksi, $queri);
                            while($penerbit=mysqli_fetch_assoc($hasil))
                                { echo "<option value='$penerbit[penerbit_kode]'>  $penerbit[penerbit_kode]|$penerbit[penerbit_nama]</option>"; }
                        ?>
                        </select>
                </div>
            </div>
            <div class="form-group row
            ">
                <div class="col-xs-8">
                    <label for ="ex1">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for ="ex1">Jumlah Halaman</label>
                        <input type="text" class="form-control" id="jumlah" placeholder="Enter jumlah buku" name="jumlah" >
                </div>
                <div class="col-xs-3">
                    <label for ="ex2">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun"><option>Tahun</option>
                        <?php
                            for ($i=2018;$i>=1970;$i--)
                                {echo "<option>$i</option>";}
                        ?>
                        </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-8">
                    <label for ="ex1">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" placeholder="Enter pengarang" name="pengarang">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-8">
                    <label for ="ex1">Deskripsi</label>
                        <input type="text-area" class="form-control" id="pengarang" placeholder="Enter pengarang" name="diskripsi">
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
<?php }
?>