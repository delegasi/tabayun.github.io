<?php
	session_start();
	include '../../koneksi/koneksi.php';

    date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
        $blnNow = date("m");
        $tglNow = date("d");
        $jam = date("H");
        $menit = date("i");
        $detik = date("s");
        $judul = "RELAAS";


    $id			= mysqli_real_escape_string($db,$_POST['id']);
	
	$sql  		= "SELECT * FROM tb_delegasimasuk where id='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);


	$nama_file_lengkap 		= $_FILES['file_permo_relaas']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['file_permo_relaas']['type'];
	$ukuran_file 	= $_FILES['file_permo_relaas']['size'];
	$tmp_file 		= $_FILES['file_permo_relaas']['tmp_name'];

    if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){	
        
		$nama_baru = $judul.'-'.$jam.$menit.$detik.'_'.$tglNow.$blnNow.$thnNow. $ext_file;
		$path = "../dokumen-permohonan/file-relaas/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
	
    //jika gambar tidak ada
	$sql = "UPDATE tb_delegasimasuk set file_permo_relaas = '$nama_baru' where id='".$id."'";
				
		$execute = mysqli_query($db, $sql);		

		if ($sql){				
        echo "<script>alert('Data Berhasil Upload')</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<meta http-equiv='refresh' content='0; url=$url'>";
	}
		else{
        echo "<script>alert('Data Gagal Upload')</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<meta http-equiv='refresh' content='0; url=$url'>";
		
	}
}
	?>
	