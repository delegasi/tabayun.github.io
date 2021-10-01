<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_ket'])) {

	$id = $_GET['id_ket'];
    	

	$sql2  		= "SELECT * FROM tb_keterangan where id_ket='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_keterangan WHERE id_ket='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                
        		echo "<script>alert('Data Keterangan Berhasil Di Hapus')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../dataketerangan.php'>";
            }		else{
        		echo "<script>alert('Data Keterangan Gagal Di Hapus')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../dataketerangan.php'>";
	}	
}	
}						
?>   