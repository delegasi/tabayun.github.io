<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";


include 'wablas.php';
kirim_wa('6285282808486','Tes Kirim WA');

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


 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_right">
                <h2>Delegasi Masuk > <small>Data Delegasi Masuk</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data<small>Delegasi Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                     <form action="downloadlaporan_suratmasuk.php"  name="download_suratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="bulan" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Bulan</option>
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
                          <select name="tahun" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Tahun</option>
                            <?php
                                for ($tahun=2017;$tahun<=2022;$tahun++)
                                      {
                                       echo  '<option value="'.$tahun.'">'.$tahun.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Delegasi Masuk</button></a>
                  <a href="inputsuratmasuk.php"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Delegasi Masuk</button></a>
                  </form> 
                  <div class="x_content">
                  <div class="x_content">
                              <?php
                              include '../koneksi/koneksi.php';
                              $sql1     = "SELECT * FROM tb_delegasimasuk order by id desc";                        
                              $query1   = mysqli_query($db, $sql1);
                              $total    = mysqli_num_rows($query1);
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Delegasi Masuk</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered" width="100%">
                      <thead>
                        <tr>
                          <th width="8%">No Urut</th>
                          <th width="20%">Nama Pengadilan</th>
                          <!-- <th width="3%">No Perkara</th>
                          <th width="10%">Nama Pihak</th>
                          <th width="10%">Alamat</th> -->
                          <th width="10%">No Surat</th>
                          <th width="15%">Tanggal Surat</th>
                          <!-- <th width="15%">Tanggal Sidang</th>
                          <th width="15%">Tanggal Terima</th>
                          <th width="15%">Tanggal Disposisi</th>
                          <th width="15%">Tanggal Relaas</th>
                          <th width="15%">Tanggal Pengembalian</th> -->
                          <th width="10%">Nama JS</th>
                          <th width="20%">Wilayah JS</th>
                          <!-- <th width="25%">Keterangan</th> -->
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                            <?php
                            while($data = mysqli_fetch_array($query1)){
                              echo'<tr>
                              <td>  '. $data['no_urut'].'    </td>
                              <td>  '. $data['nama_pengadilan'].'   </td>
                              
                              
                              <td>  '. $data['no_surat'].'      </td>
                              <td>  '. $data['tgl_surat'].'   </td>
                              
                              <td>  '. $data['nama_js'].'  </td> 
                              <td>  '. $data['wilayah_js'].'  </td> 
                               
                              <td style="text-align:center;">
                              <a href= surat_masuk/'.$data['file'].'><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href= downloaddisposisi.php?id='.$data['id'].'><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href=detail-suratmasuk.php?id='.$data['id'].'><button type="button" title="Detail" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                              <a href=editsuratmasuk.php?id='.$data['id'].'><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="proses/proses_hapussuratmasuk.php?id='.$data['id'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
                              <a href=editsuratmasuk.php?id='.$data['id'].'><button type="button" title="Send Wa" class="btn btn-default btn-xs"><i class="fa fa-send"></i></button></a>
                              </td>
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

