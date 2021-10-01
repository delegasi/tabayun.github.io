<?php
session_start();
unset($_SESSION['r3su']);
unset($_SESSION['username']);
unset($_SESSION['gambar']);
unset($_SESSION['nama']);
unset($_SESSION['id']);
session_destroy();
echo "<script>alert('Anda Telah Keluar Sistem')<br><h2>('Terima Kasih')</h2></script> ";
echo "<meta http-equiv='refresh' content='1;url=../'>";
?>