
<?php
	session_start();
	include '../../koneksi/koneksi.php';
 
$query = mysqli_query($conn, "SELECT * FROM tb_delegasimasuk WHERE nama_js='".mysqli_escape_string($conn, $_POST['nama_js'])."'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);