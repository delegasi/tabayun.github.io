<?php 
session_start();
include "../login/ceksession.php";
include '../koneksi/koneksi.php';

$data = $_POST['data'];
$id = $_POST['id'];

$n=strlen($id);
$m=($n==2?5:($n==5?8:13));
// $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));
?>
<?php 
if($data == "kabupaten"){
	?>
	Kabupaten/Kota
	<select name="kabupaten" class="select2_single form-control" id="form_kab">
		<option value="">Pilih Kabupaten/Kota</option>
		<?php 
		include '../koneksi/koneksi.php';
		$daerah = "SELECT * FROM kabupaten WHERE id_prov=? ORDER BY nama ASC";

		$query    = mysqli_query($db, $daerah);
                                while ($d = mysqli_fetch_array($query)){
			?>
			<option value="<?php echo $d['id_kab']; ?>"><?php echo $d['nama']; ?></option>
			<?php 
		}
		?>
	</select>

	<?php 
}else if($data == "kecamatan"){ 
	?>
	<select name="kecamatan" class="select2_single form-control" id="form_kec">
		<option value="">Pilih Kecamatan</option>
		<?php 
		include '../koneksi/koneksi.php';
		$daerah = "SELECT * FROM kecamatan WHERE id_kab=? ORDER BY nama ASC";

		$query    = mysqli_query($db, $daerah);
                                while ($d = mysqli_fetch_array($query)){
			?>
			<option value="<?php echo $d['id_kec']; ?>"><?php echo $d['nama']; ?></option>
			<?php 
		}
		?>
	</select>

	<?php 
}else if($data == "desa"){ 
	?>

	<select name="desa" id="form_kel">
		<option class="select2_single form-control" value="">Pilih Kelurahan</option>
		<?php 
		include '../koneksi/koneksi.php';
		$daerah = "SELECT * FROM kelurahan WHERE id_kec=? ORDER BY nama ASC";
		$query    = mysqli_query($db, $daerah);
                                while ($d = mysqli_fetch_array($query)){
			?>
			<option value="<?php echo $d['id_kel']; ?>"><?php echo $d['nama']; ?></option>
			<?php 
		}
		?>
	</select>

	<?php 

}
?>