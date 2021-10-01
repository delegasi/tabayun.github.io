<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_wilayah'])) {

	$id = $_GET['id_wilayah'];
    	

	$sql2  		= "SELECT * FROM tb_wilayah where id_wilayah='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_wilayah WHERE id_wilayah='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                
        		echo "<script>alert('Data Wilayah Berhasil Di Hapus')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../datawilayah.php'>";
            }		else{
        		echo "<script>alert('Data Wilayah Gagal Di Hapus')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../datawilayah.php'>";
	}	
}	
}						
?>   