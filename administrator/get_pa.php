<?php
include '../koneksi/koneksi.php';
	$pta_id = $_POST['pta_id'];

	echo "<option value=''>== Pilih Pengadilan Agama ==</option>";

	$query = "SELECT * FROM pa_agama WHERE pta_id=? ORDER BY nama_pa ASC";
	$dewan1 = $db->prepare($query);
	$dewan1->bind_param("i", $pta_id);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_pa'] . "'>" . $row['nama_pa'] . "</option>";
	}
?>