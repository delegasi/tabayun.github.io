<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
include "../template/assets/library/date.php"
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Digital PA Majalengka </title>

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
    <link rel="shortcut icon" href="../img/icon.ico">

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
                        <div class="title_left">
                            <h3>Delegasi Masuk</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Edit Delegasi Masuk</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />

                                    <form action="" method="POST">


                                        <?php include '../koneksi/koneksi.php';
                                        $id                = mysqli_real_escape_string($db, $_GET['id']);
                                        $sql              = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                        $query            = mysqli_query($db, $sql);
                                        $data             = mysqli_fetch_array($query);
                                        $no_urut          = $data['no_urut'];
                                        $nama_js          = $data['nama_js'];
                                        $no_telpon        = $data['no_telpon'];
                                        $file             = $data['file'];
                                        ?>

								<div class="form-group">
									<input value="<?php echo $data['no_telpon']; ?>" type="number"  name="mobile" />
								</div>
								<!-- <div class="form-group">
									<input type="file" class="form-control" name="image" required="">
								</div> -->
								<div class="form-group">
									<textarea name="message"  class="form-control" placeholder="Type Message" required=""></textarea>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-success" value="Send Message" > 
								</div>
							</form>

                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $mobile = $_POST['no_telpon'];
                                        $message = $_POST['nama_js'];

                                        $phone = $mobile;

                                        $curl = curl_init();
                                        $payload = json_encode(array(
                                         // 'sender' => 'YOUR_SENDER',
                                        'destination' => $phone,
                                        'message' => $message,
                                        ));
                                        curl_setopt_array($curl, array(
                                            CURLOPT_RETURNTRANSFER => 1,
                                            CURLOPT_URL => 'https://api.nusasms.com/nusasms_api/1.0/whatsapp/message',
                                            // For testing
                                            /*CURLOPT_URL => $BASE_TEST_URL . '/message',*/
                                            CURLOPT_POST => true,
                                             CURLOPT_HTTPHEADER => array(
                                                "APIKey: F8933F8E896E386CD0188ACB17BCED4F",
                                                'Content-Type:application/json'
                                             ),
                                             CURLOPT_POSTFIELDS => $payload,
                                             CURLOPT_SSL_VERIFYPEER => 0,    // Skip SSL Verification
                                        ));

                                        $resp = curl_exec($curl);

if (!$resp) {
	die('error: "' .  curl_error($curl) . '" . Code: ' . curl_errno($curl));
} else {
	echo $resp;
}
curl_close($curl);

                                            echo "<script>alert('Data Delegasi Masuk Berhasil Di Ubah')</script>";
        		                            echo "<meta http-equiv='refresh' content='0; url=delegasimasuk.php?id=".$id."'>";		
		                                }
                                    ?>

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
</body>

</html>