<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_keterangan			           = mysqli_real_escape_string($db,$_POST['nama_keterangan']);
	
	
	if (!($nama_keterangan=='')){		
		
		$sql = "INSERT INTO tb_keterangan(nama_keterangan)
				values ('$nama_keterangan')";
		$execute = mysqli_query($db, $sql);
		
        		echo "<script>alert('Data Keterangan Berhasil Diinput')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../dataketerangan.php'>";
	}
	else{

        		echo "<script>alert('Maaf Data Yang Anda Masukan Salah')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../dataketerangan.php'>";
	}
	
?>
	