<?php
	session_start();
	include '../../koneksi/koneksi.php';

    $id				                = mysqli_real_escape_string($db,$_POST['id']);
	$pa_tinggi	        	= mysqli_real_escape_string($db,$_POST['id_pta']);
	$pa_agama	        	= mysqli_real_escape_string($db,$_POST['id_pa']);
	$no_perkara	                	= mysqli_real_escape_string($db,$_POST['no_perkara']);
    $nama_pihak               		= mysqli_real_escape_string($db,$_POST['nama_pihak']);
	$alamat	                		= mysqli_real_escape_string($db,$_POST['alamat']);
	$provinsi					        = mysqli_real_escape_string($db,$_POST['id_prov']);
	$kabupaten					        = mysqli_real_escape_string($db,$_POST['id_kab']);
	$kecamatan					        = mysqli_real_escape_string($db,$_POST['id_kec']);
	$kelurahan					        = mysqli_real_escape_string($db,$_POST['id_kel']);
	$no_surat            			= mysqli_real_escape_string($db,$_POST['no_surat']);
    $tgl_surat                      = mysqli_real_escape_string($db,$_POST['tgl_surat']);
	$tgl_sidang		            	= mysqli_real_escape_string($db,$_POST['tgl_sidang']);
	$tgl_terima   	            	= mysqli_real_escape_string($db,$_POST['tgl_terima']);
    $tgl_disposisi	                = mysqli_real_escape_string($db,$_POST['tgl_disposisi']);
	$tgl_relaas	                    = mysqli_real_escape_string($db,$_POST['tgl_relaas']);
	$tgl_pengembalian               = mysqli_real_escape_string($db,$_POST['tgl_pengembalian']);
	$nama_js	                    = mysqli_real_escape_string($db,$_POST['nama_js']);
	$no_hp_js	                    = mysqli_real_escape_string($db,$_POST['no_hp_js']);
	$wilayah_js	                    = mysqli_real_escape_string($db,$_POST['wilayah_js']);
    $nama_keterangan	                    = mysqli_real_escape_string($db,$_POST['nama_keterangan']);
	
        date_default_timezone_set('Asia/Jakarta'); 
		
        $tgl_surat                  = date('Y-m-d', strtotime($tgl_surat));
        $tgl_sidang                 = date('Y-m-d', strtotime($tgl_sidang));
        $tgl_terima                 = date('Y-m-d', strtotime($tgl_terima));
        $tgl_disposisi              = date('Y-m-d', strtotime($tgl_disposisi));
        $tgl_relaas                 = date('Y-m-d', strtotime($tgl_relaas));
        $tgl_pengembalian           = date('Y-m-d', strtotime($tgl_pengembalian));


	$sql  		= "SELECT * FROM tb_delegasimasuk WHERE id='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
   $sql = "UPDATE tb_delegasimasuk SET id_prov = '$provinsi', id_kab = '$kabupaten', id_kec = '$kecamatan', id_kel = '$kelurahan',
   id_pta = '$pa_tinggi', id_pa = '$pa_agama', no_perkara = '$no_perkara', nama_pihak = '$nama_pihak', alamat = '$alamat', no_surat = '$no_surat',
   tgl_surat = '$tgl_surat', tgl_sidang = '$tgl_sidang', tgl_terima = '$tgl_terima', tgl_disposisi = '$tgl_disposisi', tgl_relaas = '$tgl_relaas',
   tgl_pengembalian = '$tgl_pengembalian', nama_keterangan = '$nama_keterangan', nama_js = '$nama_js', no_hp_js = '$no_hp_js',
   wilayah_js = '$wilayah_js' WHERE id = $id";
				
		$execute = mysqli_query($db, $sql);			

		if($execute){
						
        echo "<script>alert('Data Delegasi Masuk Berhasil Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../delegasimasuk.php'>";
	}	
	else{
        echo "<script>alert('Data Delegasi Gagal Di Ubah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../editdelegasimasuk.php?id=".$id."'>";
		}
	
	
	?>
	