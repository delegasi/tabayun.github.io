<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
include "../template/assets/library/date.php"
/*include "weblas.php";

kirim_wa('6285282808486','Tes Kirim WA');*/

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
              <div class="title_right">
                <h2>DELEGASI - TABAYUN </h2>
              </div>
            </div>


                             <?php
                              include '../koneksi/koneksi.php';
                              $blnth = $_GET['blnth']; // membaca bulan dan tahun dari parameter link
                              $query = "SELECT * FROM tb_delegasimasuk WHERE date_format(tanggal, '%M %Y') = '$blnth'";
                              $hasil = mysqli_query($db, $query);
                              $data = mysqli_fetch_array($hasil);
                              ?>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>DATA DELEGASI - <?php echo tanggal_indonesia(date($data['tanggal'])); ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <form action="detailjurusita.php"  name="carijs" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="bulan" class="select2_single form-control" tabindex="-1" required="required">
                            <option>PILIH BULAN</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="tahun" class="select2_single form-control" tabindex="-1" required>
                            <option>PILIH TAHUN</option>
                            <?php
                                for ($tahun=2020;$tahun<=2030;$tahun++)
                                      {
                                       echo  '<option value="'.$tahun.'">'.$tahun.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                        <button name="carijs" value="Simpan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                  </form><br>
                  <!-- <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Delegasi Masuk</button></a> -->
                  <a href="inputdelegasimasuk.php"><button type="button" class="btn btn-success" style="text-transform:uppercase"><i class="fa fa-plus"></i> Tambah Delegasi</button></a>
                  <a href="export.php"><button type="button" class="btn btn-success" style="text-transform:uppercase"><i class="fa fa-plus"></i> Export To Excel</button></a>
                  </form>
                  <div class="x_content">
                  <div class="x_content">
                             <?php
                              include '../koneksi/koneksi.php';
                              $blnth = $_GET['blnth']; // membaca bulan dan tahun dari parameter link
                              $query = "SELECT * FROM tb_delegasimasuk WHERE date_format(tanggal, '%M %Y') = '$blnth'";
                              $hasil = mysqli_query($db, $query);
                              ?>
                    <table id="datatable" class="table table-striped table-bordered" style="background-color: #0a210e42;">
                      <thead>
                        <tr>
                          <th style="text-transform:uppercase">No Perkara</th>
                          <th style="text-transform:uppercase">JS Ditunjuk</th>
                          <th style="text-transform:uppercase">Status</th>
                          <th style="text-transform:uppercase">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                            <?php
                            while ($data = mysqli_fetch_array($hasil)){
                              ?>

                              <tr>
                              <td style="text-transform:uppercase"><?php echo $data['no_perkara']; ?></td>
                              <td style="text-transform:uppercase"><?php echo $data['nama_js']; ?></td>

                              <td style="text-transform:uppercase">
                              <?php if ($data['status'] == 'Belum Dilaksanakan') {
                                ?>
                              <font style="color:red" style="text-transform:uppercase"><b> Belum Terlaksana</b></font>

                              <?php } else { ?>
                                <font style="color:green" style="text-transform:uppercase"><b> Sudah Terkirim</b></font>
                                <?php } ?>
                              </td>
                              

                              <td style="text-align:center;">
                              <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                            
                              <a href= downloaddisposisi.php?id=<?php echo $data['id']; ?>><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a> -->
                           
                              <a href=detail-delegasimasuk.php?id=<?php echo $data['id']; ?>><button type="button" title="Detail" class="btn btn-info btn-xs">DETAIL <i class="fa fa-file-image-o"></i></button></a><!-- 
                            
                              <a href=editdelegasimasuk.php?id=<?php echo $data['id']; ?>><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                           
                              <a onclick="return konfirmasi()" href="proses/proses_hapusdelegasimasuk.php?id='.$data['id'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
                           
                              <a href=kirimwa.php?id=<?php echo $data['id']; ?>><button type="button" title="Send Wa" class="btn btn-default btn-xs"><i class="fa fa-send"></i></button></a> -->
                              </td>
                              </tr>
                          <?php  } 
                            ?>
                      </tbody>
                    </table>
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