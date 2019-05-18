<?php 
require 'funcitions.php';
if( isset($_POST["register"]) ) {
    if( register($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan, silahkan login!');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('gagal menambahkan user baru!');
                document.location.href = 'login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perpus Amik | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">AMP</h1>

            </div>
            <h3>Mendaftar Ke Perpus AMIK</h3>
            <p>Silahkan Buat Akun Anda.</p>
            <form class="m-t" role="form" method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="nama" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input name="syarat" type="checkbox"><i></i> Saya Setuju Dengan Syarat Dan Ketentuan </label></div>
                </div>
                <button type="submit" name="register" class="btn btn-primary block full-width m-b">Mendaftar</button>

                <p class="text-muted text-center"><small>Sudah Punya Akun?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small>Perpus AMIK &copy; 2019</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
