<?php
	session_start();
	include '../koneksi/koneksi.php';

    	$sql  		= "SELECT * FROM tb_delegasimasuk where id='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
 $mobile = $_POST['no_telpon'];
$message = $_POST['file'];

$phone = $mobile;

$curl = curl_init();
$payload = json_encode(array(
 // 'sender' => 'YOUR_SENDER',
'destination' => $mobile,
'message' => $message,
));
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.nusasms.com/nusasms_api/1.0/whatsapp/message',
    // For testing
    /*CURLOPT_URL => $BASE_TEST_URL . '/message',*/
    CURLOPT_POST => true,
     CURLOPT_HTTPHEADER => array(
        "APIKey: F8933F8E896E386CD0188ACB17BCED4F",
        'Content-Type:application/json'
     ),
     CURLOPT_POSTFIELDS => $payload,
     CURLOPT_SSL_VERIFYPEER => 0,    // Skip SSL Verification
));

$resp = curl_exec($curl);

if (!$resp) {
	die('error: "' .  curl_error($curl) . '" . Code: ' . curl_errno($curl));
} else {
	echo $resp;
}
curl_close($curl);

$execute = mysqli_query($db, $sql);	

echo "<script>alert('Data Delegasi Masuk Berhasil Di Ubah')</script>";
        		echo "<meta http-equiv='refresh' content='0; url=../delegasimasuk.php?id=".$id."'>";		
		}


                                    
?>