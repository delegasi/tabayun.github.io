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
  
    <!-- bootstrap-progressbar -->
    <link href="../template/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../template/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
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
          <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">     
                            <br><br> 
                                <center><h1><b>Selamat Datang,  <?php echo $_SESSION['nama'];?></b></h1></center>
                            <br><br>  
                        </div>
                      </div>
                                <?php include '../koneksi/koneksi.php';
                                $sql1   = "SELECT * FROM tb_delegasimasuk";  
                                $query1   = mysqli_query($db, $sql1);
                                $jumlah1   = mysqli_num_rows($query1);
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="delegasimasuk.php">
                          <div class="icon"><i class="fa fa-inbox"></i>
                          </div>
                          <div class="count"><?php echo "$jumlah1" ?></div>
                          <h3>TABAYUN</h3>
                          <p>Telah diarsipkan</p>
                        </a>
                        </div>
                      </div>
                                <!-- <?php /*include '../koneksi/koneksi.php';
                                $sql2   = "SELECT * FROM tb_suratkeluar";  
                                $query2   = mysqli_query($db, $sql2);
                                $jumlah2   = mysqli_num_rows($query2);*/
                                  ?> -->
                      <!--<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="datasuratkeluar.php">
                          <div class="icon"><i class="fa fa-send"></i>
                          </div>
                          <div class="count"><?php echo "$jumlah2" ?></div>
                          <h3>Delegasi Keluar</h3>
                          <p>Telah Diarsipkan</p>
                        </a>
                        </div>
                      </div>
                                <?php /*include '../koneksi/koneksi.php';
                                $sql3   = "SELECT * FROM tb_bagian";  
                                $query3   = mysqli_query($db, $sql3);
                                $jumlah3   = mysqli_num_rows($query3);*/
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="databagian.php">
                          <div class="icon"><i class="fa fa-group (alias)"></i>
                          </div>
                          <div class="count"><?php echo "$jumlah3" ?></div>

                          <h3>Bagian</h3>
                          <p>Telah Didaftarkan</p>
                        </a>
                        </div>
                      </div>-->
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
    <!-- Chart.js -->
    <script src="../template/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../template/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../template/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../template/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../template/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../template/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="../template/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../template/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../template/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../template/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../template/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../template/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../template/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../template/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../template/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../template/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../template/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../template/assets/vendors/moment/min/moment.min.js"></script>
    <script src="../template/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../template/assets/build/js/custom.min.js"></script>
  
  </body>
</html>
