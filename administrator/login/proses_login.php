<?php
//koneksi ke database
session_start();
include "../../koneksi/koneksi.php";

//validasi login
$username	=	mysqli_real_escape_string($db,$_POST['username_admin']); 
$password	=	mysqli_real_escape_string($db,sha1($_POST['password'])); 
$query		=	mysqli_query($db,"SELECT * FROM tb_admin WHERE username_admin='$username' AND password='$password'"); 
$data		=	$query->fetch_array();
$jumlah=$query->num_rows;

if ($jumlah>0){
    session_start();
	echo"login berhasil ! ";
	$nama=$data['nama_admin'];
	$id =$data['id_admin'];
	$_SESSION['r3su'] = 'dmn';
	$_SESSION['id'] = $id;
	$_SESSION['username'] 	= $username;
	/*$_SESSION[sesi_user] = $username["username"];
	$_SESSION[sesi_user] = $nama["nama"];
    $_SESSION[sesi_pass] = $password["password"];*/
	$_SESSION['nama'] = $nama;
	header('location:../');

	echo"<script>alert('Selamat Datang $_SESSION[nama]..')</script>";
    echo "<meta http-equiv='refresh' content='0; url=administrator'>";
} else {
    echo"<script>alert('Anda Gagal Login, Username Atau Password Salah..')</script>";
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<meta http-equiv='refresh' content='0; url=$url'>";

}

?>