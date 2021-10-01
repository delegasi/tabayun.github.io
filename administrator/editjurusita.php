<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
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
                                        <h2>EDIT JURUSITA</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <form action="proses/proses_editjurusita.php" method="post" enctype="multipart/form-data" id="demo-form2" name="formupdate" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php
                                            include '../koneksi/koneksi.php';
                                            $id = mysqli_real_escape_string($db, $_GET['id_js']);
                                            $sql = "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah where id_js='" . $id . "'";
                                            $query = mysqli_query($db, $sql);
                                            $data = mysqli_fetch_array($query);
                                            ?>
                                            <input type=hidden name="id_js" value="<?php echo $id; ?>">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NAMA JURUSITA <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?php echo $data['nama_js']; ?>" type="text" id="nama_js" name="nama_js" required="required" onkeyup="myFunction()"  placeholder="Masukkan Nama Juru Sita" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NO WHATSAPP <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?php echo $data['no_hp_js']; ?>" type="text" onkeyup="validAngka(this)" id="no_hp_js" name="no_hp_js" required="required" maxlength="14" placeholder="Masukkan Nomor HP" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">WILAYAH JS <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="id_wilayah" class="select2_single form-control" tabindex="-1">
                                                        <option></option>
                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $no = 1;
                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                        $daerah = "SELECT * FROM tb_wilayah ORDER BY id_wilayah DESC";
                                                        $query = mysqli_query($db, $daerah);
                                                        while ($prov = mysqli_fetch_array($query)) {
                                                            if ($prov['id_wilayah'] == $data['id_wilayah']) {
                                                                echo "<option value=\"" . $prov['id_wilayah'] . "\" selected>" . $prov['nama_wilayah'] . "</option>";
                                                            } else {
                                                                echo "<option value=\"" . $prov['id_wilayah'] . "\">" . $prov['nama_wilayah'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <a href="datajurusita.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
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
        <!-- Initialize datetimepicker -->
        <script>
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
        </script>
        <script language='javascript'>
            function validAngka(a)
            {
                if (!/^[0-9.]+$/.test(a.value))
                {
                    a.value = a.value.substring(0, a.value.length - 1000);
                }
            }
        </script>
        <script>
            function myFunction() {
                var x = document.getElementById("nama_js");
                x.value = x.value.toUpperCase();
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".add-more").click(function () {
                    var html = $(".copy").html();
                    $(".after-add-more").after(html);
                });

                // saat tombol remove dklik control group akan dihapus 
                $("body").on("click", ".remove", function () {
                    $(this).parents(".control-group").remove();
                });
            });
        </script>
    </body>
</html>
