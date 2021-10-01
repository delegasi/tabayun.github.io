<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_wilayah			           = mysqli_real_escape_string($db,$_POST['nama_wilayah']);
	
	
	if (!($nama_wilayah=='')){		
		
		$sql = "INSERT INTO tb_wilayah(nama_wilayah)
				values ('$nama_wilayah')";
		$execute = mysqli_query($db, $sql);
		
        		echo "<script>alert('Data Wilayah Berhasil Diinput')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../datawilayah.php'>";
	}
	else{

        		echo "<script>alert('Maaf Data Yang Anda Masukan Salah')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../datawilayah.php'>";
	}
	
?>
	