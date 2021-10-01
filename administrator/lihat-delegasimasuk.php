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
                  <div class="clearfix"></div>
                </div>
                <?php include '../koneksi/koneksi.php';
                $no = 1;
                $id      = mysqli_real_escape_string($db, $_GET['id']);
                $sql      = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                $query    = mysqli_query($db, $sql);
                $data     = mysqli_fetch_array($query); ?>
                <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Detail Delegasi Masuk </h2>
                      </div>
                    </div>
                    <div class="x_content">
                    </div>

                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="40%">Nomor Urut</td>
                          <td><?php echo $data['no_urut'] ?></td>
                        </tr>
                        <tr>
                          <td>Nama Pengadilan</td>
                          <td><?php echo $data['nama_pengadilan'] ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Perkara</td>
                          <td><?php echo $data['no_perkara'] ?></td>
                        </tr>
                        <tr>
                          <td>Nama Pihak</td>
                          <td><?php echo $data['nama_pihak'] ?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?php echo $data['alamat'] ?></td>
                        </tr>

                         <?php include '../koneksi/koneksi.php';
                        $no = 1;
                        $id      = mysqli_real_escape_string($db, $_GET['id']);
                        $sql      = "SELECT * FROM tb_delegasimasuk LEFT JOIN provinsi ON tb_delegasimasuk.id_prov=provinsi.id_prov ORDER BY id DESC";
                        $query    = mysqli_query($db, $sql);
                        $prov     = mysqli_fetch_array($query); 
                        ?>

                        <tr>
                          <td>Provinsi</td>
                          <td><?php echo $prov['nama'] ?></td>
                        </tr>

                        <?php include '../koneksi/koneksi.php';
                        $no = 1;
                        $id      = mysqli_real_escape_string($db, $_GET['id']);
                        $sql      = "SELECT * FROM tb_delegasimasuk LEFT JOIN kabupaten ON tb_delegasimasuk.id_kab=kabupaten.id_kab ORDER BY id DESC";
                        $query    = mysqli_query($db, $sql);
                        $kab     = mysqli_fetch_array($query); 
                        ?>

                        <tr>
                          <td>Kabubpaten</td>
                          <td><?php echo $kab['nama'] ?></td>
                        </tr>

                        <?php include '../koneksi/koneksi.php';
                        $no = 1;
                        $id      = mysqli_real_escape_string($db, $_GET['id']);
                        $sql      = "SELECT * FROM tb_delegasimasuk LEFT JOIN kecamatan ON tb_delegasimasuk.id_kec=kecamatan.id_kec ORDER BY id DESC";
                        $query    = mysqli_query($db, $sql);
                        $kec     = mysqli_fetch_array($query); 
                        ?>

                        <tr>
                          <td>Kecamatan</td>
                          <td><?php echo $kec['nama'] ?></td>
                        </tr>

                        <?php include '../koneksi/koneksi.php';
                        $no = 1;
                        $id      = mysqli_real_escape_string($db, $_GET['id']);
                        $sql      = "SELECT * FROM tb_delegasimasuk LEFT JOIN kelurahan ON tb_delegasimasuk.id_kel=kelurahan.id_kel ORDER BY id DESC";
                        $query    = mysqli_query($db, $sql);
                        $kel     = mysqli_fetch_array($query); 
                        ?>

                        <tr>
                          <td>Kelurahan</td>
                          <td><?php echo $kel['nama'] ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?php echo $data['no_surat'] ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Surat</td>
                          <td><?php echo tanggal_indonesia(date($data['tgl_surat'])); ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Sidang</td>
                          <td><?php echo tanggal_indonesia(date($data['tgl_sidang'])); ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Terima</td>
                          <td><?php echo tanggal_indonesia(date($data['tgl_terima'])); ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi</td>
                          <td><?php echo tanggal_indonesia(date($data['tgl_disposisi'])); ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Relaas</td>
                          <td><?php echo tanggal_indonesia(date($data['tgl_relaas'])); ?></td>
                        </tr>
                        <td>Tanggal Pengembalian</td>
                        <td><?php echo tanggal_indonesia(date($data['tgl_pengembalian'])); ?></td>
                        </tr>
                        <tr>
                          <td>File</td>
                          <td><a href="<?php echo 'surat_masuk/' . $data['file'] . '' ?>"><b>Unduh File</b></a></td>
                        </tr>
                        <tr>
                          <td>Nama JS</td>
                          <td><?php echo $data['nama_js'] ?></td>
                        </tr>
                        <?php include '../koneksi/koneksi.php';
                                $sql  		= "SELECT * FROM tb_jurusita WHERE nama_js='" . $id . "'";                        
                                $query  	= mysqli_query($db, $sql);
                                $js = mysqli_fetch_array($query);
                                ?> 
                        <!-- <tr>
                          <td>Nomor Whatsapp</td>
                          <td><?php echo $data['no_hp_js'] ?></td>
                        </tr> -->
                        <tr>
                          <td>Wilayah JS</td>
                          <td><?php echo $data['wilayah_js'] ?></td>
                        </tr>
                        <tr>
                          <td>Keterangan</td>
                          <td><?php echo $data['keterangan'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-right">
                      <a href="delegasimasuk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
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