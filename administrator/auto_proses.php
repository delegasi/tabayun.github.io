<?php
	include '../koneksi/koneksi.php';
//variabel nim yang dikirimkan form.php
$nama_js = $_GET['nama_js'];

//mengambil data
$query = mysqli_query($db, "select * from tb_jurusita where nama_js='$nama_js'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'no_hp_js'      =>  @$mahasiswa['no_hp_js'],);

//tampil data
echo json_encode($data);
 ?>