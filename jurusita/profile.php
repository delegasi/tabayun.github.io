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
                <h3>Bagian</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bagian ><small>Profil Bagian</small></h2>
                    <div class="clearfix"></div>
                  </div>
                          <?php include '../koneksi/koneksi.php';
                          $sql  		= "SELECT * FROM tb_bagian where id_bagian='".$_SESSION['id']."'";                          
                          $query  	= mysqli_query($db, $sql);
                          $data 		= mysqli_fetch_array($query);?>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/<?php echo $data['gambar'];?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3 align="center"><?php echo $data['nama_bagian']?></h3>

                       <a href="editprofile.php"><button type="button" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Edit Profil</button></a>
                      <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Bagian </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="50%">ID</td>
                          <td><?php echo $data['id_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Nama Bagian</td>
                          <td><?php echo $data['nama_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Username Admin Bagian</td>
                          <td><?php echo $data['username_admin_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td><?php echo $data['nama_lengkap']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td><?php echo $data['tanggal_lahir_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?php echo $data['alamat']?></td>
                        </tr>
                           <tr>
                          <td>No HP</td>
                          <td><?php echo $data['no_hp_bagian']?></td>
                        </tr>
                      </tbody>
                    </table>

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
    <!-- morris.js -->
    <script src="../template/assets/vendors/raphael/raphael.min.js"></script>
    <script src="../template/assets/vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../template/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../template/assets/vendors/moment/min/moment.min.js"></script>
    <script src="../template/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../template/assets/build/js/custom.min.js"></script>

  </body>
</html>