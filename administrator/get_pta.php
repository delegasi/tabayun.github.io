<?php
include '../koneksi/koneksi.php';

	echo "<option value=''>== Pilih Pengadilan Tinggi Agama ==</option>";

	$query = "SELECT * FROM pa_tinggi_agama ORDER BY nama_pta ASC";
	$dewan1 = $db->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_pta'] . "'>" . $row['nama_pta'] . "</option>";
	}
?>