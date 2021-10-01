<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
include '../koneksi/koneksi.php';
?>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIMORETA </title>

        <!-- Bootstrap -->
        <link href="../template/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../template/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../template/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../template/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="../template/assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="../template/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="../template/assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="../template/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="../template/assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <!-- starrr -->
        <link href="../template/assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="../template/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <link rel="shortcut icon" href="../template/img/logo.png">

        <!-- Custom Theme Style -->
        <link href="../template/assets/build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <!-- Profile and Sidebarmenu -->
                <?php
                include("sidebarmenu.php");
                ?>
                <!-- /Profile and Sidebarmenu -->

                <!-- top navigation -->
                <?php
                include("header.php");
                ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>TAMBAH TABAYUN MASUK
                                          <!-- ><small>Tambah Delegasi Masuk</small> -->
                                        </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <form action="proses/proses_inputdelegasimasuk.php" name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                                        <?php include '../koneksi/koneksi.php';
                                        error_reporting(0);
                                            $sql2 		= "SELECT * FROM tb_delegasimasuk ORDER BY id DESC" ;  
                                            $query2  	= mysqli_query($db, $sql2);
                                            $data     = mysqli_fetch_array($query2);
                                            $jumlah   = mysqli_num_rows($query2);
                                            $nomor = $data['id'];
                                            
                                            
                                            if ($jumlah =0){
                                                $nomorbaru = "1";
                                            } else {
                                                $nomormax = substr($nomor,0,4);
                                                $nomorbaru = intval($nomormax)+1;
                                                }

                                                ?>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NO URUT <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?php echo "$nomorbaru" ?>" onkeyup="validAngka(this)" type="text" id="no_urut" name="no_urut" readonly placeholder="MASUKAN NOMOR URUT SURAT" class="form-control col-md-7 col-xs-12" style="text-transform:uppercase">
                                                </div>
                                            </div>
<!-- 
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NAMA PENGADILAN ASAL<span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="nama_pengadilan" name="nama_pengadilan" required="required" placeholder="MASUKAN PENGADILAN ASAL" class="form-control col-md-7 col-xs-12" style="text-transform:uppercase">
                                                </div>
                                            </div> -->

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PENGADILAN TINGGI AGAMA ASAL <span class="required">*</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">

                                                <?php
                                                        include '../koneksi/koneksi.php';
                                                        $sql_pta = mysqli_query($db, "SELECT * FROM pa_tinggi_agama");
                                                
                                                ?>
                                                    <select name="id_pta" class="select2_single form-control" tabindex="-1" id="pa_tinggi_agama" style="text-transform:uppercase">
                                                        <option value="">== Pilih Pengadilan Tinggi Agama ==</option>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        while ($row_pta = mysqli_fetch_array($sql_pta)) {
                                                            ?>
                                                            <option value="<?php echo $row_pta['id_pta'] ?>"><?php echo $row_pta['nama_pta'] ?></option>
                                                            <?php } ?>
                                                    </select><br>
                                                </div>

                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PENGADILAN AGAMA ASAL <span class="required">*</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="id_pa" class="select2_single form-control" id="pa_agama" style="text-transform:uppercase">
                                                <option value=""></option>
                                                <option></option>
                                                </select><br>
                                                </
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NOMOR PERKARA <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="no_perkara" name="no_perkara" required="required" placeholder="MASUKAN NOMOR PERKARA" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NAMA PIHAK <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="nama_pihak" name="nama_pihak" required="required" placeholder="MASUKAN NAMA PIHAK" class="form-control col-md-7 col-xs-12" style="text-transform:uppercase">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">ALAMAT <span class="required">*</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="id_prov" class="select2_single form-control" tabindex="-1" id="provinsi" style="text-transform:uppercase">
                                                        <option value="">== Pilih Provinsi ==</option>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $daerah = "SELECT * FROM provinsi ORDER BY nama";
                                                        $query = mysqli_query($db, $daerah);
                                                        while ($data = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $data['id_prov'] . '">' . $data['nama'] . '</option>';
                                                        }
                                                        ?>
                                                    </select><br>

                                                    <select name="id_kab" class="select2_single form-control" id="kabupaten" style="text-transform:uppercase"></select><br>

                                                    <select name="id_kec" class="select2_single form-control" id="kecamatan" style="text-transform:uppercase"></select><br>

                                                    <select name="id_kel" class="select2_single form-control" id="kelurahan" style="text-transform:uppercase"></select><br>

                                                    <textarea name="alamat" id="alamat" required="required" class="form-control" rows="3" placeholder='MASUKAN NAMA JALAN'></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NOMOR SURAT <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="no_surat" name="no_surat" required="required" placeholder="MASUKAN NOMOR SURAT" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TANGGAL SURAT <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input type="date" class="form-control has-feedback-left" name="tgl_surat" aria-describedby="inputSuccess2Status3" required="required" style="text-transform:uppercase">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TANGGAL SIDANG <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input type="date" class="form-control has-feedback-left" name="tgl_sidang" aria-describedby="inputSuccess2Status3" required="required" style="text-transform:uppercase">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TANGGAL TERIMA <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input type="date" class="form-control has-feedback-left" name="tgl_terima" aria-describedby="inputSuccess2Status3" required="required" style="text-transform:uppercase">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TANGGAL DISPOSISI <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input type="date" class="form-control has-feedback-left" name="tgl_disposisi" aria-describedby="inputSuccess2Status3" required="required" style="text-transform:uppercase">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TANGGAL RELAAS <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input type="date" class="form-control has-feedback-left" name="tgl_relaas" aria-describedby="inputSuccess2Status3" required="required" style="text-transform:uppercase">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TANGGAL PENGEMBALIAN <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input type="date" class="form-control has-feedback-left" name="tgl_pengembalian" aria-describedby="inputSuccess2Status3" required="required" style="text-transform:uppercase">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NAMA JS <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="nama_js" id="nama_js" class="form-control" onchange='changeValue(this.value)' required >  
                                                    <option value="">== PILIH JURUSITA ==</option>
                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                    $id_js = mysqli_real_escape_string($db, $_GET['id_js']);
                                                        $query  = mysqli_query($db, "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js");
                                                        $js = "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js DESC";
                                                        $result = mysqli_query($db, $js);
                                                        $a = "var no_hp_js = new Array();\n;";
                                                        $b = "var id_wilayah = new Array();\n;";
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo '<option name="nama_js" value="' . $row['nama_js'] . '">' . $row['nama_js'] . '</option>';
                                                            $a .= "no_hp_js['" . $row['nama_js'] . "'] = {no_hp_js:'" . addslashes($row['no_hp_js']) . "'};\n";
                                                            $b .= "id_wilayah['" . $row['nama_js'] . "'] = {id_wilayah:'" . addslashes($row['nama_wilayah']) . "'};\n";
                                                        }
                                                        ?>  
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NOMOR WHATSSAPP <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="no_hp_js" id="no_hp_js" class="form-control" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">WILAYAH JS <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="wilayah_js" id="id_wilayah" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">JENIS DELEGASI <span class="required">*</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="nama_keterangan" class="select2_single form-control" id="keterangan" style="text-transform:uppercase">
                                                        <option value="">== JENIS DELEGASI ==</option>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $daerah = "SELECT * FROM tb_keterangan ORDER BY id_ket ASC";
                                                        $query = mysqli_query($db, $daerah);
                                                        while ($data = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $data['nama_keterangan'] . '">' . $data['nama_keterangan'] . '</option>';
                                                        }
                                                        ?>
                                                    </select><br>
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <a href="delegasimasuk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                                                    <button type="submit" name="input" value="Simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Wulansari - @ 2021 Angkatan XII
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../template/assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../template/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../template/assets/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../template/assets/vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../template/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../template/assets/vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../template/assets/vendors/moment/min/moment.min.js"></script>
        <script src="../template/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="../template/assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="../template/assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="../template/assets/vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="../template/assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="../template/assets/vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="../template/assets/vendors/select2/dist/js/select2.full.min.js"></script>
        <script src="../template/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-datetimepicker -->
        <script src="../template/assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Parsley -->
        <script src="../template/assets/vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="../template/assets/vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="../template/assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="../template/assets/vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../template/assets/build/js/custom.min.js"></script>

        <!-- <script src="../template/js/1.12.4.jquery.min.js"></script> -->

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
        <!-- Initialize datetimepicker -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <!-- <script>
                                                        $('#myDatepicker').datetimepicker();

                                                        $('#myDatepicker2').datetimepicker({
                                                            format: 'DD.MM.YYYY'
                                                        });

                                                        $('#myDatepicker3').datetimepicker({
                                                            format: 'hh:mm A'
                                                        });

                                                        $('#myDatepicker4').datetimepicker({
                                                            ignoreReadonly: true,
                                                            allowInputToggle: true
                                                        });

                                                        $('#myDatepicker8').datetimepicker({
                                                            ignoreReadonly: true,
                                                            allowInputToggle: true
                                                        });

                                                        $('#myDatepicker9').datetimepicker({
                                                            ignoreReadonly: true,
                                                            allowInputToggle: true
                                                        });

                                                        $('#myDatepicker10').datetimepicker({
                                                            ignoreReadonly: true,
                                                            allowInputToggle: true
                                                        });

                                                        $('#myDatepicker11').datetimepicker({
                                                            ignoreReadonly: true,
                                                            allowInputToggle: true
                                                        });

                                                        $('#datetimepicker6').datetimepicker();

                                                        $('#datetimepicker7').datetimepicker({
                                                            useCurrent: false
                                                        });

                                                        $("#datetimepicker6").on("dp.change", function (e) {
                                                            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                                        });

                                                        $("#datetimepicker7").on("dp.change", function (e) {
                                                            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                                        });
        </script> -->
        <script language='javascript'>
                                                        function validAngka(a) {
                                                            if (!/^[0-9.]+$/.test(a.value)) {
                                                                a.value = a.value.substring(0, a.value.length - 1000);
                                                            }
                                                        }
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $.ajax({
                    type: 'POST',
                    url: "get_provinsi.php",
                    cache: false,
                    success: function (msg) {
                        $("#provinsi").html(msg);
                    }
                });

                $("#provinsi").change(function () {
                    var provinsi = $("#provinsi").val();
                    $.ajax({
                        type: 'POST',
                        url: "get_kabupaten.php",
                        data: {provinsi: provinsi},
                        cache: false,
                        success: function (msg) {
                            $("#kabupaten").html(msg);
                        }
                    });
                });

                $("#kabupaten").change(function () {
                    var kabupaten = $("#kabupaten").val();
                    $.ajax({
                        type: 'POST',
                        url: "get_kecamatan.php",
                        data: {kabupaten: kabupaten},
                        cache: false,
                        success: function (msg) {
                            $("#kecamatan").html(msg);
                        }
                    });
                });

                $("#kecamatan").change(function () {
                    var kecamatan = $("#kecamatan").val();
                    $.ajax({
                        type: 'POST',
                        url: "get_kelurahan.php",
                        data: {kecamatan: kecamatan},
                        cache: false,
                        success: function (msg) {
                            $("#kelurahan").html(msg);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#pa_tinggi_agama').change(function() {
                    var pta_id=$(this).val();

                    $.ajax({
                        type: 'POST',
                        url: 'get_pa.php',
                        data: 'pta_id='+pta_id,
                        success: function(response){
                            $('#pa_agama').html(response);
                        }
                    });
                })
            });
                </script>

        <script type="text/javascript">
            <?php
            echo $a;
            echo $b;
            ?>
            function changeValue(id) {
                document.getElementById('no_hp_js').value = no_hp_js[id].no_hp_js;
                document.getElementById('id_wilayah').value = id_wilayah[id].id_wilayah;
            }
            ;
        </script>
    </body>
</html>