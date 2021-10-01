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
        <link rel="stylesheet" href="../template/css/kategori.bootstrap.min.css">

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
                                        <h2>TAMBAH JURUSITA</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <form action="proses/proses_inputjurusita.php"  name="formbagian" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NAMA JURU SITA <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="nama_js" name="nama_js" required="required"  placeholder="MASUKAN NAMA JURU SITA" class="form-control col-md-7 col-xs-12" onkeyup="myFunction()">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NO WHATSAPP <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" onkeyup="validAngka(this)" id="no_hp_js" name="no_hp_js" required="required" maxlength="14" placeholder="MASUKAN NOMOR WHATSAPP" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group control-group after-add-more">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">WILAYAH JS <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="id_wilayah" class="select2_single form-control" tabindex="-1">
                                                        <option></option>
                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $sql = "SELECT * FROM tb_wilayah ORDER BY id_wilayah";
                                                        $query = mysqli_query($db, $sql);
                                                        while ($data = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $data['id_wilayah'] . '">' . $data['nama_wilayah'] . '</option>';
                                                        }
                                                        ?> 
                                                    </select>
                                                    <br>
                                                    <button class="btn btn-success add-more" type="button">
                                                        <i class="glyphicon glyphicon-plus"></i> TAMBAH
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <a href="datajurusita.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> BATAL</a>
                                                    <button type="submit" name="input" value="Simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> SIMPAN</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="copy hide control-group">
                                            <div class="control-group">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">WILAYAH JS <span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="id_wilayah" class="select2_single form-control" tabindex="-1">
                                                            <option></option>
                                                            <?php
                                                            include '../koneksi/koneksi.php';
                                                            $sql = "SELECT * FROM tb_wilayah ORDER BY id_wilayah";
                                                            $query = mysqli_query($db, $sql);
                                                            while ($data = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $data['id_wilayah'] . '">' . $data['nama_wilayah'] . '</option>';
                                                            }
                                                            ?> 
                                                        </select>
                                                        <br>
                                                        <button class="btn btn-danger remove" type="button">
                                                            <i class="glyphicon glyphicon-remove"></i> HAPUS
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <script src="../template/js/1.9.1.jquery.js"></script>
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
