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

    <title>Arsip Digital PA Majalengka </title>

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
          <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12"> 
                            <br><br> 
                                <center><h1><b>Hi, <?php echo $_SESSION['nama'];?></b></h1></center>
                            <br><br>  
                        </div>
                      </div>
                      <?php include '../koneksi/koneksi.php';
                          $sql1 		= "SELECT * FROM tb_suratkeluar ORDER BY tanggal_entry DESC LIMIT 1" ;  
                          $query1  	= mysqli_query($db, $sql1);
                          $data1     = mysqli_fetch_array($query1); 

                          $update = $data1['tanggal_entry'];
                          $update = date('d-m-Y H:i:s', strtotime($update));

                          $sql2 		= "SELECT * FROM tb_suratkeluar ORDER BY nomor_suratkeluar DESC LIMIT 1" ;  
                          $query2  	= mysqli_query($db, $sql2);
                          $data2     = mysqli_fetch_array($query2);
                          $jumlah   = mysqli_num_rows($query2);
                          $nomor = $data2['nomor_suratkeluar'];
                          
                          
                          if ($jumlah =0){
                            $nomorbaru = "0001";
                          } else {
                            $nomormax = substr($nomor,0,4);
                            $nomorbaru = intval($nomormax)+1;
                            }
                            ?>

                    <form action="ambilnomor.php"  name="ambilnomor" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">  
                      <input type=hidden name="nomorbaru" value="<?php echo $nomorbaru;?>"></input> 
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-numeric-asc"></i>
                          </div>
                          <div class="count"><center>Nomor Surat Keluar Berikutnya :</center></div>
                          <div class="count"><center><?php echo "$nomorbaru" ?></center></div>
                          <center><h3>Terakhir Diperbarui Pada :<?php echo "$update" ?></h3> </center>
                          <div class="count"><a href= "../administrator/file/kode_klasifikasi_surat.xlsx"><center>Lihat Kode Klasifikasi Surat</center></a></div>
                         <center><button type="submit" title="Ambil Nomor" class="btn btn-info btn-lg"><i class="fa  fa-thumb-tack">  AMBIL NOMOR</i></button></a></center>
                        </div>
                      </div>
                    </div>
                 </form>
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
