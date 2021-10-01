<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				            = mysqli_real_escape_string($db,$_POST['id_wilayah']);
    $nama_wilayah	            = mysqli_real_escape_string($db,$_POST['nama_wilayah']);
	
	$sql  		= "SELECT * FROM tb_wilayah where id_wilayah='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	$sql = "UPDATE tb_wilayah set nama_wilayah = '$nama_wilayah' where id_wilayah = $id";
				
		$execute = mysqli_query($db, $sql);		

		if ($sql){				
        echo "<script>alert('Data Wilayah Berhasil Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../datawilayah.php?id_wilayah=".$id."'>";
	}
		else{
        echo "<script>alert('Data Wilayah Gagal Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../editwilayah.php?id_wilayah=".$id."'>";
		
	}
	?>
	