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
    <!-- Datatables -->
    <link href="../template/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../template/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../template/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../template/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../template/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
                    <h2>DATA WILAYAH</h2>
                    <div class="clearfix"></div>
                  </div>
                  <a href="inputwilayah.php"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Wilayah</button></a>
                  <div class="x_content">
                  <div class="x_content">
                             <?php
                              include '../koneksi/koneksi.php';
                              $sql1  		= "SELECT * FROM tb_wilayah order by id_wilayah desc";                        
                              $query1  	= mysqli_query($db, $sql1);
                              $total		= mysqli_num_rows($query1);
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Wilayah</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered" style="background-color: #0a210e42;">
                      <thead>
                        <tr>
                          <th width="15%">Nama Wilayah</th>
                          <th width="8%">Aksi</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                            <?php
                            while($data = mysqli_fetch_array($query1)){
                              echo'<tr>
                              <td>	'. $data['nama_wilayah'].'		</td>
                              <td style="text-align:center;">
                              <a href=editwilayah.php?id_wilayah='.$data['id_wilayah'].'><button type="button" title="Edit" class="btn btn-success btn-xs"><i class="fa  fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="proses/proses_hapuswilayah.php?id_wilayah='.$data['id_wilayah'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a></td>
                              </tr>';
                            }
                            ?>
                      </tbody>
                    </table>
                  <?php } ?>
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
    <!-- iCheck -->
    <script src="../template/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../template/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../template/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../template/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../template/assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../template/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../template/assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../template/assets/build/js/custom.min.js"></script>
    	<script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
	  </script>
    <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
        }
    </script>

  </body>
</html>