<?php
	session_start();
	include '../../koneksi/koneksi.php';

    $id				        = mysqli_real_escape_string($db,$_POST['id_js']);
	$nama_wilayah	        = mysqli_real_escape_string($db,$_POST['id_wilayah']);
	$nama_js	            = mysqli_real_escape_string($db,$_POST['nama_js']);
	$no_hp_js	   	        = mysqli_real_escape_string($db,$_POST['no_hp_js']);
	
	$sql  		= "SELECT * FROM tb_jurusita where id_js='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
   $sql = "UPDATE tb_jurusita set id_wilayah = '$nama_wilayah', nama_js = '$nama_js', no_hp_js = '$no_hp_js' where id_js = $id";
				
		$execute = mysqli_query($db, $sql);			

		if($sql){
						
        echo "<script>alert('Data Juru Sita Berhasil Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../datajurusita.php?id_js=".$id."'>";
	}	
	else{
        echo "<script>alert('Data Jurusita Gagal Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../editjurusita.php?id_js=".$id."'>";
		}
	
	
	?>
	