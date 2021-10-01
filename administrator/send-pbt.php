<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'delegasipamajalengka@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Pengadilan Agama Majalengka'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email_penerima']; // Ambil email penerima dari inputan form
$subjek = 'Ini Adalah Pesan Dari PA Majalengka'; // Ambil subjek dari inputan form
$pesan = 'Ini Pesan PBT'; // Ambil pesan dari inputan form
$file_pbt = $_POST['file_pbt']; // Ambil nama file yang di upload

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'uebgvxwmducetkhu'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

if(empty($file_pbt)){ // Jika tanpa file_pbt
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
        echo "<script>alert('Data Delegasi Masuk Berhasil Dikirim)</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<meta http-equiv='refresh' content='0; url=$url'>";
	}
	else{
        		echo "<script>alert('Maaf Data Gagal Kirim')</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<meta http-equiv='refresh' content='0; url=$url'>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
}else{ // Jika dengan file_pbt
    $tmp = $_POST['file_pbt'];
    $size = $_POST['file_pbt'];

    if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
        $mail->addAttachment($tmp, $file_pbt); // Add file yang akan di kirim

        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            echo "<script>alert('Data Delegasi Masuk Berhasil Dikirim)</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<meta http-equiv='refresh' content='0; url=$url'>";
	}
	else{
        		echo "<script>alert('Maaf Data Gagal Kirim')</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<meta http-equiv='refresh' content='0; url=$url'>";
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }else{ // Jika Ukuran file lebih dari 25 MB
                echo "<script>alert('Maaf Data Lebih Dari 25 MB')</script>";
        		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<meta http-equiv='refresh' content='0; url=$url'>";
    }
}
?>
