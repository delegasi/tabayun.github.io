<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				            = mysqli_real_escape_string($db,$_POST['id_ket']);
    $nama_keterangan	            = mysqli_real_escape_string($db,$_POST['nama_keterangan']);
	
	$sql  		= "SELECT * FROM tb_keterangan where id_ket='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	$sql = "UPDATE tb_keterangan set nama_keterangan = '$nama_keterangan' where id_ket = $id";
				
		$execute = mysqli_query($db, $sql);		

		if ($sql){				
        echo "<script>alert('Data Keterangan Berhasil Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../dataketerangan.php?id_ket=".$id."'>";
	}
		else{
        echo "<script>alert('Data Wilayah Gagal Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../editketerangan.php?id_ket=".$id."'>";
		
	}
	?>
	