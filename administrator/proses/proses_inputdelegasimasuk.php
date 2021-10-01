<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	
	$no_urut					        = mysqli_real_escape_string($db,$_POST['no_urut']);
    $no_perkara               			= mysqli_real_escape_string($db,$_POST['no_perkara']);
	$nama_pihak			                = mysqli_real_escape_string($db,$_POST['nama_pihak']);
	$alamat					            = mysqli_real_escape_string($db,$_POST['alamat']);
	$provinsi					        = mysqli_real_escape_string($db,$_POST['id_prov']);
	$kabupaten					        = mysqli_real_escape_string($db,$_POST['id_kab']);
	$kecamatan					        = mysqli_real_escape_string($db,$_POST['id_kec']);
	$kelurahan					        = mysqli_real_escape_string($db,$_POST['id_kel']);
	$pa_tinggi					        = mysqli_real_escape_string($db,$_POST['id_pta']);
	$pa_agama					        = mysqli_real_escape_string($db,$_POST['id_pa']);
    $no_surat                           = mysqli_real_escape_string($db,$_POST['no_surat']);
	$tgl_surat		            		= mysqli_real_escape_string($db,$_POST['tgl_surat']);
	$tgl_sidang   	            		= mysqli_real_escape_string($db,$_POST['tgl_sidang']);
    $tgl_terima	                        = mysqli_real_escape_string($db,$_POST['tgl_terima']);
	$tgl_disposisi	                    = mysqli_real_escape_string($db,$_POST['tgl_disposisi']);
	$tgl_relaas                 		= mysqli_real_escape_string($db,$_POST['tgl_relaas']);
	$tgl_pengembalian	                = mysqli_real_escape_string($db,$_POST['tgl_pengembalian']);
	$nama_keterangan                 	= mysqli_real_escape_string($db,$_POST['nama_keterangan']);
	$nama_js                 			= mysqli_real_escape_string($db, $_POST['nama_js']);
	$no_hp_js                 			= mysqli_real_escape_string($db,$_POST['no_hp_js']);
    $wilayah_js	                        = mysqli_real_escape_string($db,$_POST['wilayah_js']);



        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
    $tgl_surat                  = date('Y-m-d H:i:s', strtotime($tgl_surat));
    $tgl_sidang                  = date('Y-m-d', strtotime($tgl_sidang));
    $tgl_terima                  = date('Y-m-d H:i:s', strtotime($tgl_terima));
    $tgl_disposisi                  = date('Y-m-d H:i:s', strtotime($tgl_disposisi));
    $tgl_relaas                  = date('Y-m-d H:i:s', strtotime($tgl_relaas));
    $tgl_pengembalian                  = date('Y-m-d H:i:s', strtotime($tgl_pengembalian));
	
    if (!($provinsi =='') and !($kabupaten =='') and !($kecamatan =='') and !($kelurahan =='') and !($pa_tinggi =='') and !($pa_agama =='') and !($no_urut=='') and !($no_perkara  =='') and !($nama_pihak =='') and !($alamat =='') and !($no_surat =='')  and !($tgl_surat =='') and !($tgl_sidang =='') and !($tgl_terima =='') and !($tgl_disposisi =='') and !($tgl_relaas =='') and !($tgl_pengembalian =='') and !($nama_keterangan =='') and !($nama_js =='') and !($no_hp_js =='') and !($wilayah_js =='')){		
		

		
		$sql = "INSERT INTO tb_delegasimasuk(id_prov, id_kab, id_kec, id_kel, id_pta, id_pa, no_urut, no_perkara, nama_pihak, alamat, no_surat, tgl_surat, tgl_sidang, tgl_terima, tgl_disposisi, tgl_relaas, tgl_pengembalian, nama_keterangan, nama_js, no_hp_js, wilayah_js, tanggal )
				values ('$provinsi', '$kabupaten', '$kecamatan', '$kelurahan', '$pa_tinggi', '$pa_agama', '$no_urut', '$no_perkara ', '$nama_pihak', '$alamat', '$no_surat', '$tgl_surat', '$tgl_sidang', '$tgl_terima', '$tgl_disposisi', '$tgl_relaas', '$tgl_pengembalian', '$nama_keterangan', '$nama_js', '$no_hp_js', '$wilayah_js', '$tanggal_entry')";
		$execute = mysqli_query($db, $sql);
		
        		echo "<script>alert('Data Delegasi Masuk Berhasil Diinput)</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../delegasimasuk.php'>";
	}
	else{
        		echo "<script>alert('Maaf Data Yang Anda Masukan Kurang Lengkap')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../inputdelegasimasuk.php'>";
	}
	
?>
	