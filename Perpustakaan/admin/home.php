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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Perpus AMIK | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php 
    include 'navbar.php';
    include 'configdb.php';

    $sql = "SELECT * FROM buku";
    $query = mysqli_query($koneksi,$sql);
    $count = mysqli_num_rows($query);

    $sql1 = "SELECT * FROM petugas";
    $query1 = mysqli_query($koneksi,$sql1);
    $count1 = mysqli_num_rows($query1);

    $sql2 = "SELECT * FROM peminjam";
    $query2 = mysqli_query($koneksi,$sql2);
    $count2 = mysqli_num_rows($query2);

    $sql3 = "SELECT * FROM peminjaman";
    $query3 = mysqli_query($koneksi,$sql3);
    $count3 = mysqli_num_rows($query3);

    $sql4 = "SELECT * FROM Kategori";
    $query4 = mysqli_query($koneksi,$sql4);
    $count4 = mysqli_num_rows($query4);

    $sql5 = "SELECT * FROM penerbit";
    $query5 = mysqli_query($koneksi,$sql5);
    $count5 = mysqli_num_rows($query5);
    


     ?>


<div class="wrapper wrapper-content">
            <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="pull-right"><a href="buku.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a></span>
                                <h5>Buku</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo " $count";  ?></h1>
                                <small>Total Buku</small><br>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="pull-right"><a href="Kategori.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a></span>
                                <h5>Kategori</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo " $count4";  ?></h1>
                                <small>Total Kategori</small>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="pull-right"><a href="penerbit.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a></span>
                                <h5>Penerbit</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo " $count5";  ?></h1>
                                <small>Total Penerbit</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="pull-right"><a href="petugas.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a></span>
                                <h5>Petugas</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo " $count1";  ?></h1>
                                <small>Total Petugas</small>

                            </div>
                        </div>
                    </div>
        </div>

        <div class="row">
                  
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="pull-right"><a href="peminjam.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a></span>
                                <h5>Peminjam</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo " $count2";  ?></h1>
                                <small>Total Pengguna</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="pull-right"><a href="peminjaman.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a></span>
                                <h5>Peminjaman</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo " $count3";  ?></h1>
                                <small>Total Peminjam</small>
                            </div>
                        </div>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content">
         <img alt="image" class="form-control" src="foto/images.jpg" width="1000px"/>
    </div>

       
    <?php include 'footer.php'; ?>              
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Menejemen Data Perpustakaan', 'Selamat Datang Di Perpus AMIK');

            }, 1300);
        });
    </script>
</body>
</html>
<?php } ?>