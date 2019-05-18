<?php
$namaserver="localhost";
$userdb="root";
$passdb="";
$namadb="perpustakaan";
$koneksi=mysqli_connect($namaserver,$userdb,$passdb,$namadb);

function register($data) {
	global $koneksi;

	$username = htmlspecialchars($_POST["nama"]);
	$password = htmlspecialchars($_POST["password"]);

	// cek username sudah pernah ada atau belum
	$cek_username = mysqli_query($koneksi, "SELECT * FROM petugas WHERE petugas_nama = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		echo "<script>
				alert('username sudah terpakai!');
				document.location.href = '';
			  </script>";
		return false;
	}

	// tambahkan user baru ke database
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert ke DB
	$sql = "INSERT INTO petugas VALUES ('', '$username', '$password', CURRENT_TIMESTAMP)";
	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}

