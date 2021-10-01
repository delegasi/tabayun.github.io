<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Tabayun-Masuk.xls");
 
// Tambahkan table
/*include 'delegasimasuk.php';*/
include "../template/assets/library/date.php"

?>


<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #000000;
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
#customers td {
  text-align: left;
}
</style>
</head>
<body>

 

                             <?php
                              include '../koneksi/koneksi.php';
                              date_default_timezone_set("Asia/Jakarta");
                // Mengambil data dari tabel
                $bulan = $_POST['bulan'];
                $tahun = $_POST['tahun'];
                $sql1  		= "SELECT * FROM tb_delegasimasuk LEFT JOIN pa_agama ON tb_delegasimasuk.id_pa=pa_agama.id_pa where MONTH(tanggal)='$bulan' AND YEAR(tanggal) = '$tahun'";                       
                $query1  	= mysqli_query($db, $sql1);

                            if ($bulan == '01') {
                              $bulan = "JANUARI";
                            } elseif ($bulan == '02') {
                              $bulan = "FEBRUARI";
                            } elseif ($bulan == '03') {
                              $bulan = "MARET";
                            } elseif ($bulan == '04') {
                              $bulan = "APRIL";
                            } elseif ($bulan == '05') {
                              $bulan = "MEI";
                            } elseif ($bulan == '06') {
                              $bulan = "JUNI";
                            } elseif ($bulan == '07') {
                              $bulan = "JULI";
                            } elseif ($bulan == '08') {
                              $bulan = "AGUSTUS";
                            } elseif ($bulan == '09') {
                              $bulan = "SEPTEMBER";
                            } elseif ($bulan == '10') {
                              $bulan = "OKTOBER";
                            } elseif ($bulan == '11') {
                              $bulan = "NOVEMBER";
                            } elseif ($bulan == '12') {
                              $bulan = "DESEMBER";
                            }
                $nama_file = 'Surat Masuk-'.$bulan.'-'.$tahun;
                ?>
                                         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_right">
                <center><h3>TABAYUN MASUK<br>
                PERIODE (<?php echo $bulan ?> - <?php echo $tahun ?>)</h3></center>
              </div>
            </div>
                  <div class="x_content">
                  <div class="x_content">
                    <table id="customers">
                      <thead>
                        <tr>
                          <th style="text-transform:uppercase">Nomor Urut</th>
                          <th style="text-transform:uppercase">Pengadilan Asal</th>
                          <th style="text-transform:uppercase">Nomor Perkara</th>
                          <th style="text-transform:uppercase">Nama Pihak</th>
                          <!-- <th style="text-transform:uppercase">Alamat</th> -->
                          <th style="text-transform:uppercase">Nomor Surat</th>
                          <th style="text-transform:uppercase">Tanggal Surat</th>
                          <th style="text-transform:uppercase">Tanggal Sidang</th>
                          <th style="text-transform:uppercase">Tanggal Terima</th>
                          <th style="text-transform:uppercase">Tanggal Disposisi</th>
                          <th style="text-transform:uppercase">Tanggal Relaas</th>
                          <th style="text-transform:uppercase">Tanggal Pengembalian</th>
                          <th style="text-transform:uppercase">Nama JS</th>
                          <!-- <th style="text-transform:uppercase">Wilayah JS</th> -->
                          <th style="text-transform:uppercase">Keterangan</th>
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
                              <td style="text-transform:uppercase"><?php echo $data['nama_pihak']; ?></td>
                              <!-- <td style="text-transform:uppercase"><?php echo $data['alamat']; ?></td> -->
                              <td style="text-transform:uppercase"><?php echo $data['no_surat']; ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_surat'])); ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_sidang'])); ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_terima'])); ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_disposisi'])); ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_relaas'])); ?></td>
                              <td style="text-transform:uppercase"><?php echo tanggal_indonesia(date($data['tgl_pengembalian'])); ?></td>
                              <td style="text-transform:uppercase"><?php echo $data['nama_js']; ?></td>
                              <!-- <td style="text-transform:uppercase"><?php echo $data['wilayah_js']; ?></td> -->
                              <td style="text-transform:uppercase"><?php echo $data['nama_keterangan']; ?></td>
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
</body>
</html>
