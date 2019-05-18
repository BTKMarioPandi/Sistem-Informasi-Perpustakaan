    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="foto/admin/<?php echo ($_SESSION['foto']); ?>" width="75px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['username']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo($_SESSION['role']); ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="contacts.php">Contacts</a></li>
                            <li class="divider"></li>
                            <li><a href="login.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        AMP
                    </div>
                </li>
                 <li>
                    <a href="home.php"><i class="fa fa-th-large"></i> <span class="nav-label">HOME</span></a>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-book"></i> <span class="nav-label">Buku</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="buku.php">Buku</a></li>
                        <li><a href="penerbit.php">Penerbit</a></li>
                        <li><a href="kategori.php">Kategori</a></li>
                    </ul>
                </li>
                <li>
                    <a href="petugas.php"><i class="fa fa-user"></i> <span class="nav-label">Petugas</span></a>
                </li>
                <li>
                    <a href="pendaftaran.php"><i class="fa fa-id-card"></i> <span class="nav-label">Kartu Pendaftaran</span></a>
                </li>
                <li>
                    <a href="peminjam.php"><i class="fa fa-users"></i> <span class="nav-label">Peminjam</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-archive"></i> <span class="nav-label">Peminjaman</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="peminjaman.php">Peminjaman</a></li>
                        <li><a href="detail_pinjam.php">Detail Pinjam</a></li>
                    </ul>
                </li>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang Di Perpustakaan AMIK</span>
                </li>
                <li>
                    <a href="logout.php" class="alert-danger">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>