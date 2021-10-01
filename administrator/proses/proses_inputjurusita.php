<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_wilayah	        = mysqli_real_escape_string($db,$_POST['id_wilayah']);
	$nama_js	            = mysqli_real_escape_string($db,$_POST['nama_js']);
	$no_hp_js	   	        = mysqli_real_escape_string($db,$_POST['no_hp_js']);

	

	
	if (!($nama_wilayah=='') and !($nama_js=='') and !($no_hp_js=='')) 	{
		
		
		$sql = "INSERT INTO tb_jurusita(id_wilayah, nama_js, no_hp_js) values ('$nama_wilayah','$nama_js', '$no_hp_js')";
		$execute = mysqli_query($db, $sql);
		
        		echo "<script>alert('Data Juru Sita Berhasil Diinput')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../datajurusita.php'>";
	}
	else{

        		echo "<script>alert('Maaf Data Yang Anda Masukan Kurang Lengkap')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../datajurusita.php'>";
	}
	
?>
	