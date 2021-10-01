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
            <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
        </style>
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
                    <h2>DATA TABAYUN</h2>
                    <div class="clearfix"></div>
                  </div>
 

<!--  <div class="col-md-2 col-sm-2 col-xs-6"> -->
                          <!-- <select name="bulan" class="select2_single form-control" tabindex="-1" onchange="location = this.value;">
                            <option>Pilih Bulan</option>
                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $query = "SELECT DISTINCT date_format(tanggal, '%M %Y') as bulantahun FROM tb_delegasimasuk";
                                                        $hasil = mysqli_query($db, $query);
                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                        echo "<option><a href='detailjurusita.php?blnth=".$data['bulantahun']."'>".$data['bulantahun']."</a></option>";
                                                        }
                                                        ?>
                          </select>
                        </div><a href="detailjurusita.php"><button type="button" class="btn btn-success" style="text-transform:uppercase"><i class="fa fa-search"></i> CARI</button></a><br><br>
 -->

                  
                      <form action="export.php"  name="download_suratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
                                for ($tahun=2020;$tahun<=2030;$tahun++)
                                      {
                                       echo  '<option value="'.$tahun.'">'.$tahun.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> UNDUH LAPORAN TABAYUN MASUK</button></a>
                  </form><br>
                  <div class="col-md-2 col-sm-2 col-xs-6">
                  <a href="inputdelegasimasuk.php"><button type="button" class="btn btn-success" style="text-transform:uppercase"><i class="fa fa-plus"></i> Tambah Delegasi</button></a>
                  </div>
                  <div class="x_content">
                  <div class="x_content">
                             <?php
                              include '../koneksi/koneksi.php';
                              $sql1  		= "SELECT * FROM tb_delegasimasuk LEFT JOIN pa_agama ON tb_delegasimasuk.id_pa=pa_agama.id_pa order by id DESC";                        
                              $query1  	= mysqli_query($db, $sql1);
                              $total		= mysqli_num_rows($query1);
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Tabayun</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered" style="background-color: #0a210e42;">
                      <thead>
                        <tr>
                          <th style="text-transform:uppercase">Nomor</th>
                          <th style="text-transform:uppercase">Pengadilan Asal</th>
                          <th style="text-transform:uppercase">No Perkara</th>
                          <th style="text-transform:uppercase">Tanggal Surat</th>
                          <th style="text-transform:uppercase">JS Ditunjuk</th>
                          <th style="text-transform:uppercase">Status</th>
                          <th width="15%" style="text-transform:uppercase">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                            <?php
                            $no = 1;
                            while($data = mysqli_fetch_array($query1)){
                              ?>

                              <tr>
                              <td style="text-transform:uppercase"><?php echo $data['no_urut']; ?></td>
                              <td style="text-transform:uppercase"><?php echo $data['nama_pa']; ?></td>
                              <td style="text-transform:uppercase"><?php echo $data['no_perkara']; ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_surat'])); ?></td>
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

                              <a href=editdelegasimasuk.php?id=<?php echo $data['id']; ?>><button type="button" title="Edit" class="btn btn-default btn-xs">EDIT <i class="fa fa-edit"></i></button></a>

                              <a onclick="return konfirmasi()" href=proses/proses_hapusdelegasimasuk.php?id=<?php echo $data['id']; ?>><button type="button" title="Hapus" class="btn btn-danger btn-xs">HAPUS <i class="fa fa-trash-o"></i></button></a>
                           
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
                  <?php }  ?>
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
    <script src="../template/js/combodate.js"></script>

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
    <script>
$(function(){
    $('#date').combodate();    
});
</script>

  </body>
</html>