<?php


if (isset($_SERVER['HTTP_REFERER'])){ //cek referal url situs
//lakukan covert data ke excel
	$query = "SELECT * FROM tbl_psb WHERE Date_Format(TglOrderMasuk,'%Y-%m')like '%$tanggal%' ORDER BY Status ASC";
	$ip = $_SERVER['REMOTE_ADDR'];
	$nama_file = "DataPSB-$tanggal.xls";
	$sql = $mysqli-&gt;query($query);
	$arrmhs = array();
	while ($row = $sql-&gt;fetch_assoc()) {
	array_push($arrmhs, $row);
	}
}

    ?>