<?php
$curl = curl_init();
$payload = json_encode(array(
    'destination' => '' .$_POST['no_hp_js']. '',
    'message' => '' .$_POST['file_permo_relaas']. ''
));
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.wachat-api.com/wachat_api/1.0/whatsapp/message',
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => array(
        "APIKey: A6CFABC2F39846B64C3751EF5A8A8B73",
        'Content-Type:application/json'
    ),
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_SSL_VERIFYPEER => 0, 
));

$resp = curl_exec($curl);

if (!$resp) {
	die('error: "' .  curl_error($curl) . '" . Code: ' . curl_errno($curl));
} else {
	echo $resp;
}
curl_close($curl);

?>
