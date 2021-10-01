<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
include "../template/assets/library/date.php"
/* include "weblas.php";

  kirim_wa('6285282808486','Tes Kirim WA'); */
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
        <script type="text/javascript" src="../template/js/jquery.idTabs.min.js"></script>
        <link rel="shortcut icon" href="../template/img/logo.png">
        <!-- Custom Theme Style -->
        <link href="../template/assets/build/css/custom.min.css" rel="stylesheet">

        <script language="javascript">
            function submit_form() {
                document.form1.submit();
                document.form2.submit();
                document.form3.submit();
            }
        </script>
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

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_content">
                                        <?php
                                        include '../koneksi/koneksi.php';
                                        error_reporting(0);
                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                        $sql1 = "SELECT * FROM tb_delegasimasuk LEFT JOIN pa_agama ON tb_delegasimasuk.id_pa=pa_agama.id_pa where id='" . $id . "'";
                                        $query1 = mysqli_query($db, $sql1);
                                        $total = mysqli_num_rows($query1);
                                        if ($total == 0) {
                                            echo"<center><h2>Belum Ada Data Tabayun</h2></center>";
                                        } else {
                                            ?>
                                            <table class="table table-striped table-bordered" style="background-color: #0a210e42;" id="customers">
                                                <thead>
                                                    <tr>
                                                        <th>NOMOR</th>
                                                        <th>PENGADILAN ASAL</th>
                                                        <th>NO PERKARA</th>
                                                        <th>TANGGAL SURAT</th>
                                                        <th>NO SURAT</th>
                                                        <th>JENIS DELEGASI</th>
                                                        <th>JS DITUNJUK</th>
                                                        <!-- <th width="15%">Tanggal Sidang</th>
                                                        <th width="15%">Tanggal Terima</th>
                                                        <th width="15%">Tanggal Disposisi</th>
                                                        <th width="15%">Tanggal Relaas</th>
                                                        <th width="15%">Tanggal Pengembalian</th> -->
                                                        <!-- <th width="12%">Nama JS</th>
                                                        <th width="10%">Wilayah JS</th> -->
                                                        <!-- <th width="25%">Keterangan</th> -->
                                                        <th width="10%">STATUS</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    while ($data = mysqli_fetch_array($query1)) {
                                                        ?>

                                                        <tr>
                                                            <td style="text-transform:uppercase"><?php echo $data['no_urut']; ?></td>
                                                            <td style="text-transform:uppercase"><?php echo $data['nama_pa']; ?></td>
                                                            <td style="text-transform:uppercase"><?php echo $data['no_perkara']; ?></td>
                                                            <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_surat'])); ?></td>
                                                            <td style="text-transform:uppercase"><?php echo $data['no_surat']; ?></td>
                                                            <td style="text-transform:uppercase"><?php echo $data['nama_keterangan']; ?></td>
                                                            <td style="text-transform:uppercase"><?php echo $data['nama_js']; ?></td>
                                                            <!-- <td><?php echo $data['nama_js']; ?></td> 
                                                            <td style="text-transform:uppercase"><?php echo $data['wilayah_js']; ?></td> --> 

                                                            <td style="text-transform:uppercase">
                                                                <?php if ($data['status'] == 'Belum Dilaksanakan') {
                                                                    ?>
                                                                    <font style="color:red"><b> Belum Terlaksana</b></font>

                                                                <?php } else { ?>
                                                                    <font style="color:green" style="text-transform:uppercase"><b> Sudah Terkirim</b></font>
                                                                <?php } ?>
                                                            </td>

                                                                                   <!--  <td style="text-align:center;"> -->
                                                                                        <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">Unduh <i class="fa fa-download"></i></button></a> -->

                                                                                          <!-- <a href= downloaddisposisi.php?id=<?php echo $data['id']; ?>><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a> -->

                                                                                           <!-- <a href=lihat-delegasimasuk.php?id=<?php echo $data['id']; ?>><button type="button" title="Detail" class="btn btn-info btn-xs">Lihat <i class="fa fa-file-image-o"></i></button></a> -->

                                                                                        <!-- <a href=editdelegasimasuk.php?id=<?php echo $data['id']; ?>><button type="button" title="Edit" class="btn btn-default btn-xs">Edit <i class="fa fa-edit"></i></button></a>

                                                                                        <a onclick="return konfirmasi()" href="proses/proses_hapusdelegasimasuk.php?id='.$data['id'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs">Hapus <i class="fa fa-trash-o"></i></button></a>

                                                                                        <a href=kirimwa.php?id=<?php echo $data['id']; ?>><button type="button" title="Send Wa" class="btn btn-info btn-xs">Kirim Wa <i class="fa fa-send"></i></button></a> -->


                                                            <!-- </td> -->
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table><br>


                                            <!-- Kirim Wa -->
                                            <div class="">
                                                <div class="page-title">
                                                    <div class="title_right">
                                                        <h2 style="color: #C00"><b>E-DOC PERMOHONAN</b></h2>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered" style="background-color: #0a210e42;" id="customers">
                                                    <?php
                                                    include '../koneksi/koneksi.php';
                                                    $id = mysqli_real_escape_string($db, $_GET['id']);
                                                    $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                    $query1 = mysqli_query($db, $sql1);
                                                    $data = mysqli_fetch_array($query1);
                                                    $total = mysqli_num_rows($query1);
                                                    if (!empty($data['file_permo_relaas'])) {
                                                        ?>
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">FILE</th>
                                                                <th width="35%"><center>UPLOAD FILE</center></th>
                                                        <th width="30%"><center>KIRIM WA</center></th>
                                                        </tr>
                                                        </thead>

                                                        <tr>
                                                            <td style="text-transform:uppercase"><br><?php echo $data['file_permo_relaas']; ?></td>

                                                                                                                                                        <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->

                                                            <td style="text-align:center;">
                                                                <div class="row"><br>
                                                                    <form action="proses/proses_edit_file_permohonanrelaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <?php
                                                                        include '../koneksi/koneksi.php';
                                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                        $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                        $query = mysqli_query($db, $sql);
                                                                        $relaas = mysqli_fetch_array($query);
                                                                        ?>
                                                                        <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                        <div class="col-sm-6"> <span class="required"></span>
                                                                            <a href="<?php echo 'dokumen-permohonan/file-relaas/' . $data['file_permo_relaas'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-2">
                                                                                <input name="file_permo_relaas" value="<?php echo $relaas['file_permo_relaas']; ?>" accept="application/pdf" type="file" id="img" style="display:none;" autocomplete="off" required /><label for="img" class="btn btn-link">PILIH FILE</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <button type="submit" name="input" class="btn btn-success" value="Simpan" > UBAH FILE </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- <div class="row"><br>
                                                                    <form action="proses/proses_file_permohonanrelaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col-sm-6"> <span class="required"></span>
                                                                            <a href="<?php echo 'dokumen-permohonan/file_relaas/' . $data['file_permohonan_relaas'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                        </div>
                                                                        <div class="col">
                                                                            <button type="submit" name="input" class="btn btn-primary" value="Simpan" ><i class="fa fa-upload" ></i> EDIT FILE</button>
                                                                        </div>
                                                                    </form>
                                                                </div> -->
                                                            </td>

                                                            <td style="text-align:center;">
                                                                <div class="form-group">
                                                                    <form action="sendwapdf.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <?php
                                                                        include '../koneksi/koneksi.php';
                                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                        $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                        $query1 = mysqli_query($db, $sql1);
                                                                        while ($relaas = mysqli_fetch_array($query1)) {
                                                                            $filename = 'dokumen-permohonan/file-relaas/' . $data['file_permo_relaas'] . '';

                                                                            /* define('UPLOAD_DIR', 'dokumen-permohonan/file-relaas/');
                                                                            $img = $_POST['img'];
                                                                            $img = str_replace('data:dokumen-permohonan/file-relaas/pdf;base64,', '', $img);
                                                                            $img = str_replace(' ', '+', $img);
                                                                            $data = base64_decode($img);
                                                                            $file = UPLOAD_DIR . uniqid() . '.pdf';
                                                                            $success = file_put_contents($file, $data); */

                                                                             define('UPLOAD_DIR', 'dokumen-permohonan/file-relaas/');
                                                                            $image_parts = explode(";base64,", $_POST['file_permo_relaas']);
                                                                            $image_type_aux = explode("file_permo_relaas/", $image_parts[0]);
                                                                            $image_type = $image_type_aux[1];
                                                                            $image_base64 = base64_decode($image_parts[1]);
                                                                            $file = UPLOAD_DIR . uniqid() . '.pdf';
                                                                            file_put_contents($file, $image_base64);
                                                                            ?>
                                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                            <input type="hidden" name="no_surat" value="<?php echo $relaas['no_surat']; ?>">
                                                                            <input type="text" name="file_permo_relaas" value="<?php echo 'https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_100kB.jpg' ?>">
                                                                    <div class="col-md-7">
                                                                        <select name="nama_js" id="nama_js" class="form-control" onchange='changeValue(this.value)' required >  
                                                                            <option value="">== PILIH JURUSITA ==</option>
                                                                            <?php
                                                                            include '../koneksi/koneksi.php';
                                                                            $query = mysqli_query($db, "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js");
                                                                            $js = "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js DESC";
                                                                            $result = mysqli_query($db, $js);
                                                                            $a = "var no_hp_js = new Array();\n;";
                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                                echo '<option name="nama_js" value="' . $row['nama_js'] . '">' . $row['nama_js'] . '</option>';
                                                                                $a .= "no_hp_js['" . $row['nama_js'] . "'] = {no_hp_js:'" . addslashes($row['no_hp_js']) . "'};\n";
                                                                            }
                                                                            ?>  
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-md-7">
                                                                        <input type="text" name="no_hp_js" id="no_hp_js" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <!-- <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data"> -->
                                                                        <div class="col">
                                                                            <button type="submit" name="input" value="Simpan" class="btn btn-warning"><i class="fa fa-send"></i> KIRIMa</button>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </form>
                                                                </div>
                                                                <!-- <div class="row">
                                                                    <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col">
                                                                            <button type="submit" name="input" value="Simpan" class="btn btn-warning"><i class="fa fa-send"></i> KIRIM</button>
                                                                        </div>
                                                                    </form>
                                                                </div -->
                                                            </td>
                                                        </tr>

                                                    <?php } else { ?>

                                                        <thead>
                                                            <tr>
                                                                <th width="20%">FILE</th>
                                                                <th width="30%"><center>UPLOAD FILE</center></th>
                                                        <th width="30%"><center>KIRIM WA</center></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>

                                                            <tr>
                                                                <td style="text-transform:uppercase"></td>

                                                                                                <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->

                                                                <td style="text-align:center;">
                                                                    <div class="row">
                                                                        <form action="proses/proses_file_permohonanrelaas.php" name="id" method="POST" enctype="multipart/form-data">
                                                                            <div class="col-sm-6"> <span class="required"></span>
                                                                                <?php
                                                                                include '../koneksi/koneksi.php';
                                                                                $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                                $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                                $query = mysqli_query($db, $sql);
                                                                                $relaas = mysqli_fetch_array($query);
                                                                                ?>
                                                                                <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                                <!-- <input type=hidden name="no_surat" value="<?php echo $relaas['no_surat']; ?>"> -->
                                                                                <input name="file_permo_relaas" value="<?php echo $relaas['file_permo_relaas']; ?>" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="submit" name="input" class="btn btn-primary" value="Simpan" ><i class="fa fa-upload" ></i> UPLOAD PEMOHONAN</button>
                                                                            </div>
                                                    <br>
                                                    <button class="btn btn-success add-more" type="button">
                                                        <i class="glyphicon glyphicon-plus"></i> TAMBAH
                                                    </button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="copy hide control-group">
                                            <div class="control-group">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">WILAYAH JS <span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="id" class="select2_single form-control" tabindex="-1">
                                                            <option></option>
                                                            <?php
                                                                                include '../koneksi/koneksi.php';
                                                                                $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                                $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                                $query = mysqli_query($db, $sql);
                                                                                $relaas = mysqli_fetch_array($query);
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
                                                                    <!-- <div class="row">
                                                                        <form action="proses/proses_file_permohonanpbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                            <div class="col-sm-6"> <span class="required"></span>
                                                                                <input name="file_permohonan_pbt" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="submit" name="input" class="btn btn-primary" value="Simpan"  style="width: 32%;"><i class="fa fa-upload" ></i> UPLOAD PBT</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </td> -->

                                                                <td style="text-align:center;">
                                                                    <!-- <div class="row">
                                                                            <div class="col">
                                                                                <button class="btn btn-dark"><i class="fa fa-send"></i> KIRIM</button>
                                                                            </div>
                                                                    </div> -->
                                                                    <div class="row">
                                                                            <div class="col">
                                                                                <button class="btn btn-dark"><i class="fa fa-send"></i> KIRIM</button>
                                                                            </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                    <?php
                                                    include '../koneksi/koneksi.php';
                                                    $id = mysqli_real_escape_string($db, $_GET['id']);
                                                    $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                    $query1 = mysqli_query($db, $sql1);
                                                    $total = mysqli_num_rows($query1);
                                                    if (!empty($data['file_permo_pbt'])) {
                                                        ?>

                                                        <tr>
                                                            <td style="text-transform:uppercase"><br><?php echo $data['file_permo_pbt']; ?></td>

                                                                                                                                                        <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->

                                                            <td style="text-align:center;">
                                                                <div class="row"><br>
                                                                    <form action="proses/proses_edit_file_permohonanpbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <?php
                                                                        include '../koneksi/koneksi.php';
                                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                        $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                        $query = mysqli_query($db, $sql);
                                                                        $relaas = mysqli_fetch_array($query);
                                                                        ?>
                                                                        <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                        <div class="col-sm-6"> <span class="required"></span>
                                                                            <a href="<?php echo 'dokumen-permohonan/file-pbt/' . $data['file_permo_pbt'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-2">
                                                                                <input name="file_permo_pbt" value="<?php echo $relaas['file_permo_pbt']; ?>" accept="application/pdf" type="file" id="img2" style="display:none;" autocomplete="off" required /><label for="img2" class="btn btn-link">PILIH FILE</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <button type="submit" name="input" class="btn btn-success" value="Simpan" > UBAH FILE </button>
                                                                        </div>
                                                                        
                                                    <br>
                                                    <button class="btn btn-success add-more" type="button">
                                                        <i class="glyphicon glyphicon-plus"></i> TAMBAH
                                                    </button>
                                                                    </form>
                                                                </div>
                                                                <!-- <div class="row"><br>
                                                                    <form action="proses/proses_file_permohonanpbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col-sm-6"> <span class="required"></span>
                                                                            <a href="<?php echo 'dokumen-permohonan/file_pbt/' . $data['file_permohonan_pbt'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                        </div>
                                                                        <div class="col">
                                                                            <button type="submit" name="input" class="btn btn-primary" value="Simpan" ><i class="fa fa-upload" ></i> EDIT FILE</button>
                                                                        </div>
                                                                    </form>
                                                                </div> -->
                                                            </td>

                                                            <td style="text-align:center;">
                                                                <!-- <div class="row">
                                                                    <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col">
                                                                            <button type="submit" name="input" value="Simpan" class="btn btn-warning"><i class="fa fa-send"></i> KIRIM</button>
                                                                        </div>
                                                                    </form>
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <form action="waapi.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <?php
                                                                        include '../koneksi/koneksi.php';
                                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                        $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                        $query1 = mysqli_query($db, $sql1);
                                                                        while ($relaas = mysqli_fetch_array($query1)) {
                                                                            ?>
                                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                            <input type="hidden" name="no_surat" value="<?php echo $relaas['no_surat']; ?>">
                                                                            <input type="hidden" name="file_permo_relaas" value="<?php echo 'http://localhost:8080/simoreta/administrator/dokumen-permohonan/file-relaas/' . $relaas['file_permo_relaas'] . '' ?>">
                                                                    <div class="col-md-7">
                                                                        <select name="nama_js" id_2="nama_js" class="form-control" onchange='changeValue(this.value)' required >  
                                                                            <option value="">== PILIH JURUSITA PBT ==</option>
                                                                            <?php
                                                                            include '../koneksi/koneksi.php';
                                                                            $query = mysqli_query($db, "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js");
                                                                            $js = "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js DESC";
                                                                            $result = mysqli_query($db, $js);
                                                                            $c = "var no_hp_js = new Array();\n;";
                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                                echo '<option name="nama_js" value="' . $row['nama_js'] . '">' . $row['nama_js'] . '</option>';
                                                                                $c .= "no_hp_js['" . $row['nama_js'] . "'] = {no_hp_js:'" . addslashes($row['no_hp_js']) . "'};\n";
                                                                            }
                                                                            ?>  
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-md-7">
                                                                        <input type="text" name="no_hp_js" id_2="no_hp_js2" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col">
                                                                            <button type="submit" name="input" value="Simpan" class="btn btn-warning"><i class="fa fa-send"></i> KIRIM</button>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </form>
                                                                </div>
                                                                <!-- <div class="row">
                                                                    <form action="send-pbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col">
                                                                            <button type="submit" name="input" value="Simpan" class="btn btn-warning"><i class="fa fa-send"></i> KIRIM</button>
                                                                        </div>
                                                                    </form>
                                                                </div> -->
                                                            </td>

                                                        </tr>



                                                        <tbody>


                                                        </tbody>

                                                    <?php } else { ?>

                                                        <tbody>

                                                            <tr>
                                                                <td style="text-transform:uppercase"></td>

                                                                                                <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->

                                                                <td style="text-align:center;">
                                                                    <div class="row">
                                                                        <form action="proses/proses_file_permohonanpbt.php" name="id" method="POST" enctype="multipart/form-data">
                                                                            <div class="col-sm-6"> <span class="required"></span>
                                                                                <?php
                                                                                include '../koneksi/koneksi.php';
                                                                                $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                                $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                                $query = mysqli_query($db, $sql);
                                                                                $relaas = mysqli_fetch_array($query);
                                                                                ?>
                                                                                <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                               <!--  <input type=hidden name="no_surat" value="<?php echo $relaas['no_surat']; ?>"> -->
                                                                                <input name="file_permo_pbt" value="<?php echo $relaas['file_permo_pbt']; ?>" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="submit" name="input" class="btn btn-primary" value="Simpan" style="width: 44%;"><i class="fa fa-upload" ></i> UPLOAD PBT</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- <div class="row">
                                                                        <form action="proses/proses_file_permohonanpbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                            <div class="col-sm-6"> <span class="required"></span>
                                                                                <input name="file_permohonan_pbt" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="submit" name="input" class="btn btn-primary" value="Simpan"  style="width: 32%;"><i class="fa fa-upload" ></i> UPLOAD PBT</button>
                                                                            </div>
                                                                        </form>
                                                                    </div> -->
                                                                </td>

                                                                <td style="text-align:center;">
                                                                    <div class="row">
                                                                            <div class="col">
                                                                                <button class="btn btn-dark"><i class="fa fa-send"></i> KIRIM</button>
                                                                            </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="">
                                                <div class="page-title">
                                                    <div class="title_right">
                                                        <h2 style="color: #C00"><b>E-DOC RELAAS / PBT</b></h2>
                                                    </div>
                                                </div>
                                                <!-- Kirim Email -->
                                                <table class="table table-striped table-bordered" style="background-color: #0a210e42;" id="customers">
                                                    <?php
                                                    include '../koneksi/koneksi.php';
                                                    $id = mysqli_real_escape_string($db, $_GET['id']);
                                                    $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                    $query1 = mysqli_query($db, $sql1);
                                                    $total = mysqli_num_rows($query1);
                                                    if (!empty($data['file_relaas'])) {
                                                        ?>
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">FILE</th>
                                                                <th width="30%"><center>UPLOAD FILE</center></th>
                                                        <th width="30%"><center>KIRIM EMAIL</center></th>
                                                        </tr>
                                                        </thead>

                                                        <tr>
                                                            <td style="text-transform:uppercase"><?php echo $data['file_relaas']; ?></td>

                                                            <td style="text-align:center;">
                                                                <div class="row">
                                                                    <form action="proses/proses_filerelaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <?php
                                                                        include '../koneksi/koneksi.php';
                                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                        $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                        $query = mysqli_query($db, $sql);
                                                                        $relaas = mysqli_fetch_array($query);
                                                                        ?>
                                                                        <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                        <div class="col-sm-6"> <span class="required"></span>
                                                                            <a href="<?php echo 'dokumen-relaas/file-relaas/' . $data['file_relaas'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-2">
                                                                                <input name="file_relaas" value="<?php echo $relaas['file_relaas']; ?>" accept="application/pdf" type="file" id="img3" style="display:none;" autocomplete="off" required /><label for="img3" class="btn btn-link">PILIH FILE</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <button type="submit" name="input" class="btn btn-success" value="Simpan" > UBAH FILE </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- <div class="row">
                                                                    <form action="proses/proses_filepbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col-sm-6"> <span class="required"></span>
                                                                            <input name="file_pbt" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                        </div>
                                                                        <div class="col">
                                                                            <button type="submit" name="input" class="btn btn-primary" value="Simpan"  style="width: 30%;"><i class="fa fa-upload" ></i> UPLOAD PBT</button>
                                                                        </div>
                                                                    </form>
                                                                </div> -->
                                                            </td>

                                                            <td style="text-align:center;">
                                                                <div class="row">
                                                                    <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <?php
                                                                        include '../koneksi/koneksi.php';
                                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                        $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                        $query1 = mysqli_query($db, $sql1);
                                                                        while ($relaas = mysqli_fetch_array($query1)) {
                                                                            ?>
                                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                            <input type="hidden" name="file_relaas" value="<?php echo 'dokumen-relaas/file-relaas/' . $relaas['file_relaas'] . '' ?>">
                                                                            <div class="col-sm-9"><span class="required"></span>
                                                                                <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />

                                                                            </div>

                                                                            <div class="col">
                                                                                <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIMa</button>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </form>
                                                                </div>
                                                                <!-- <div class="row">
                                                                    <form action="send-pbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                        <div class="col-sm-9"><span class="required"></span>
                                                                            <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                        </div>
                                                                        <div class="col">
                                                                            <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIM</button>
                                                                        </div>
                                                                    </form>
                                                                </div> -->
                                                            </td>

                                                                                                                    <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->
                                                        </tr>




                                                        <tbody>


                                                        <?php } else { ?>


                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            while ($data = mysqli_fetch_array($query1)) {
                                                                ?>

                                                                <tr>
                                                                    <td style="text-transform:uppercase"></td>

                                                                    <td style="text-align:center;">
                                                                        <div class="row">
                                                                            <form action="proses/proses_filerelaas.php" name="id" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-6"> <span class="required"></span>
                                                                                    <?php
                                                                                    include '../koneksi/koneksi.php';
                                                                                    $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                                    $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                                    $query = mysqli_query($db, $sql);
                                                                                    $relaas = mysqli_fetch_array($query);
                                                                                    ?>
                                                                                    <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                                    <input name="file_relaas" value="<?php echo $relaas['file_relaas']; ?>" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" class="btn btn-primary" value="Simpan" ><i class="fa fa-upload" ></i> UPLOAD RELAAS</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- <div class="row">
                                                                            <form action="proses/proses_filepbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-6"> <span class="required"></span>
                                                                                    <input name="file_pbt" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" class="btn btn-primary" value="Simpan"  style="width: 30%;"><i class="fa fa-upload" ></i> UPLOAD PBT</button>
                                                                                </div>
                                                                            </form>
                                                                        </div> -->
                                                                    </td>

                                                                    <td style="text-align:center;">
                                                                        <div class="row">
                                                                            <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                                <?php
                                                                                include '../koneksi/koneksi.php';
                                                                                $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                                $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                                $query = mysqli_query($db, $sql);
                                                                                $relaas = mysqli_fetch_array($query);
                                                                                ?>
                                                                                <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                                <div class="col-sm-9"><span class="required"></span>
                                                                                    <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                                    <!-- <input type="file" name="file_relaas" value="<?php echo $relaas['file_relaas']; ?>"  /> -->
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIM</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- <div class="row">
                                                                            <form action="send-pbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-9"><span class="required"></span>
                                                                                    <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIM</button>
                                                                                </div>
                                                                            </form>
                                                                        </div> -->
                                                                    </td>

                                                                                                            <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>


                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                        $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                        $query1 = mysqli_query($db, $sql1);
                                                        $total = mysqli_num_rows($query1);
                                                        if (!empty($data['file_pbt'])) {
                                                            ?>

                                                            <tr>
                                                                <td style="text-transform:uppercase"><?php echo $data['file_pbt']; ?></td>

                                                                <td style="text-align:center;">
                                                                    <!-- <div class="row">
                                                                        <form action="proses/proses_filerelaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                            <div class="col-sm-6"> <span class="required"></span>
                                                                                <a href="<?php echo 'dokumen-relaas/file_relaas/' . $data['file_relaas'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="submit" name="input" class="btn btn-primary" value="Simpan" ><i class="fa fa-upload" ></i> UPLOAD RELAAS</button>
                                                                            </div>
                                                                        </form>
                                                                    </div> -->
                                                                    <div class="row">
                                                                        <form action="proses/proses_filepbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                            <?php
                                                                            include '../koneksi/koneksi.php';
                                                                            $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                            $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                            $query = mysqli_query($db, $sql);
                                                                            $relaas = mysqli_fetch_array($query);
                                                                            ?>
                                                                            <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                            <div class="col-sm-6"> <span class="required"></span>
                                                                                <a href="<?php echo 'dokumen-relaas/file-pbt/' . $data['file_pbt'] . '' ?>" target="_blank" class="btn btn-info"><b>Lihat File</b></a>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-2">
                                                                                    <input name="file_pbt" value="<?php echo $relaas['file_pbt']; ?>" accept="application/pdf" type="file" id="img4" style="display:none;" autocomplete="off" required /><label for="img4" class="btn btn-link">PILIH FILE</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <button type="submit" name="input" class="btn btn-success" value="Simpan" > UBAH FILE </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                                <td style="text-align:center;">
                                                                    <!-- <div class="row">
                                                                        <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                            <div class="col-sm-9"><span class="required"></span>
                                                                                <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIM</button>
                                                                            </div>
                                                                        </form>
                                                                    </div> -->
                                                                    <div class="row">
                                                                        <form action="send-pbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                            <?php
                                                                            include '../koneksi/koneksi.php';
                                                                            $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                            $sql1 = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                            $query1 = mysqli_query($db, $sql1);
                                                                            while ($pbt = mysqli_fetch_array($query1)) {
                                                                                ?>
                                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                                <input type="hidden" name="file_pbt" value="<?php echo 'dokumen-relaas/file-pbt/' . $pbt['file_pbt'] . '' ?>">
                                                                                <div class="col-sm-9"><span class="required"></span>
                                                                                    <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIMwa</button>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                                                                                    <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->
                                                            </tr>

                                                        <tbody>

                                                        <?php } else { ?>

                                                        <thead>
                                                            <tr>
                                                                <th width="20%">FILE</th>
                                                                <th width="30%"><center>UPLOAD FILE</center></th>
                                                        <th width="30%"><center>KIRIM EMAIL</center></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            while ($data = mysqli_fetch_array($query1)) {
                                                                ?>

                                                                <tr>
                                                                    <td style="text-transform:uppercase"></td>

                                                                    <td style="text-align:center;">
                                                                        <!-- <div class="row">
                                                                            <form action="proses/proses_filerelaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-6"> <span class="required"></span>
                                                                                    <input name="file_relaas" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" class="btn btn-primary" value="Simpan" ><i class="fa fa-upload" ></i> UPLOAD RELAAS</button>
                                                                                </div>
                                                                            </form>
                                                                        </div> -->
                                                                        <div class="row">
                                                                            <form action="proses/proses_filepbt.php" name="id" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-6"> <span class="required"></span>
                                                                                    <?php
                                                                                    include '../koneksi/koneksi.php';
                                                                                    $id = mysqli_real_escape_string($db, $_GET['id']);
                                                                                    $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                                                                    $query = mysqli_query($db, $sql);
                                                                                    $relaas = mysqli_fetch_array($query);
                                                                                    ?>
                                                                                    <input type=hidden name="id" value="<?php echo $id; ?>">
                                                                                    <input name="file_pbt" value="<?php echo $relaas['file_pbt']; ?>" accept="application/pdf" type="file" id="file" class="form-control" autocomplete="off" required />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" class="btn btn-primary" value="Simpan"  style="width: 35%;"><i class="fa fa-upload" ></i> UPLOAD PBT</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </td>

                                                                    <td style="text-align:center;">
                                                                        <!-- <div class="row">
                                                                            <form action="send-relaas.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-9"><span class="required"></span>
                                                                                    <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIM</button>
                                                                                </div>
                                                                            </form>
                                                                        </div> -->
                                                                        <div class="row">
                                                                            <form action="send-pbt.php" name="formsuratmasuk" method="POST" enctype="multipart/form-data">
                                                                                <div class="col-sm-9"><span class="required"></span>
                                                                                    <input type="email" name="email_penerima" required="required" placeholder="Masukkan Email Penerima" class="form-control" />
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="input" value="Simpan" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> KIRIM</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </td>

                                                                                                            <!-- <a href= surat_masuk/<?php echo $data['file']; ?> target="_blank"><button type="button" title="Unduh File" class="btn btn-success btn-xs">UNDUH FILE <i class="fa fa-download"></i></button></a> -->
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table><br>
                                            </div>

                                            <div class="text-right">
                                                <a href="delegasimasuk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                            </div>

                                        <?php } ?>



                                        <?php
                                        include '../koneksi/koneksi.php';
                                        $no = 1;
                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                        $sql = "SELECT * FROM tb_delegasimasuk where id='" . $id . "'";
                                        $query = mysqli_query($db, $sql);
                                        $data = mysqli_fetch_array($query);
                                        ?>

                                        <div class="x_content">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="profile_title">
                                                    <div class="col-md-6">
                                                        <h2>DETAIL </h2>
                                                    </div>
                                                </div>
                                                <div class="x_content">
                                                </div>

                                                <table class="table table-striped table-bordered" style="background-color: #0a210e42;" id="customers">
                                                    <tbody>

                                                        <tr>
                                                            <td>NAMA PIHAK</td>
                                                            <td style="text-transform:uppercase"><?php echo $data['nama_pihak'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ALAMAT</td>
                                                            <td style="text-transform:uppercase"><?php echo $data['alamat'] ?></td>
                                                        </tr>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $no = 1;
                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                        $sql = "SELECT * FROM tb_delegasimasuk LEFT JOIN provinsi ON tb_delegasimasuk.id_prov=provinsi.id_prov WHERE id = '" . $id . "'";
                                                        $query = mysqli_query($db, $sql);
                                                        $prov = mysqli_fetch_array($query);
                                                        ?>

                                                        <tr>
                                                            <td>PROVINSI</td>
                                                            <td style="text-transform:uppercase"><?php echo $prov['nama'] ?></td>
                                                        </tr>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $no = 1;
                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                        $sql = "SELECT * FROM tb_delegasimasuk LEFT JOIN kabupaten ON tb_delegasimasuk.id_kab=kabupaten.id_kab WHERE id = '" . $id . "'";
                                                        $query = mysqli_query($db, $sql);
                                                        $kab = mysqli_fetch_array($query);
                                                        ?>

                                                        <tr>
                                                            <td>KABUPATEN</td>
                                                            <td style="text-transform:uppercase"><?php echo $kab['nama'] ?></td>
                                                        </tr>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $no = 1;
                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                        $sql = "SELECT * FROM tb_delegasimasuk LEFT JOIN kecamatan ON tb_delegasimasuk.id_kec=kecamatan.id_kec WHERE id = '" . $id . "'";
                                                        $query = mysqli_query($db, $sql);
                                                        $kec = mysqli_fetch_array($query);
                                                        ?>

                                                        <tr>
                                                            <td>KECAMATAN</td>
                                                            <td style="text-transform:uppercase"><?php echo $kec['nama'] ?></td>
                                                        </tr>

                                                        <?php
                                                        include '../koneksi/koneksi.php';
                                                        $no = 1;
                                                        $id = mysqli_real_escape_string($db, $_GET['id']);
                                                        $sql = "SELECT * FROM tb_delegasimasuk LEFT JOIN kelurahan ON tb_delegasimasuk.id_kel=kelurahan.id_kel WHERE id = '" . $id . "'";
                                                        $query = mysqli_query($db, $sql);
                                                        $kel = mysqli_fetch_array($query);
                                                        ?>

                                                        <tr>
                                                            <td>KELURAHAN</td>
                                                            <td style="text-transform:uppercase"><?php echo $kel['nama'] ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td>NAMA JS</td>
                                                            <td style="text-transform:uppercase"><?php echo $data['nama_js'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NOMOR WHATSAPP</td>
                                                            <td style="text-transform:uppercase"><?php echo $data['no_hp_js'] ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td>WILAYAH JS</td>
                                                            <td style="text-transform:uppercase"><?php echo $data['wilayah_js'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>KETERANGAN</td>
                                                            <td style="text-transform:uppercase"><?php echo $data['nama_keterangan'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="x_content">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="profile_title">
                                                    <div class="col-md-6">
                                                        <h2>TANGGAL DELEGASI </h2>
                                                    </div>
                                                </div>
                                                <div class="x_content">
                                                </div>

                                                <table class="table table-striped" style="background-color: #0a210e42;" id="customers">
                                                    <tbody>
                                                        <tr>
                                                            <td>TANGGAL SURAT</td>
                                                            <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_surat'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TANGGAL SIDANG</td>
                                                            <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_sidang'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TANGGAL TERIMA SURAT</td>
                                                            <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_terima'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TANGGAL DISPOSISI</td>
                                                            <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_disposisi'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TANGGAL RELAAS</td>
                                                            <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_relaas'])); ?></td>
                                                        </tr>
                                                    <td>TANGGAL PENGEMBALIAN</td>
                                                    <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_pengembalian'])); ?></td>
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
                                                                            $(document).ready(function () {
                                                                                $('#example').DataTable();
                                                                            });
        </script>
        <script type="text/javascript" language="JavaScript">
            function konfirmasi()
            {
                tanya = confirm("Anda Yakin Akan Menghapus Data ?");
                if (tanya == true)
                    return true;
                else
                    return false;
            }
        </script>
        <script type="text/javascript">
<?php
echo $a;
?>
            function changeValue(id) {
                document.getElementById('no_hp_js').value = no_hp_js[id].no_hp_js;
            }
            ;
        </script>
<!--         <script type="text/javascript">
<?php
echo $c;
?>
            function changeValue(id_2) {
                document.getElementById('no_hp_js2').value = no_hp_js[id].no_hp_js;
            }
            ;
        </script> -->
        <script>
            function myFunction() {
                var x = document.getElementById("file_permo_relaas");
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
    </body>
</html>