                 <form method=POST action='modul/laporan/laporan_pertanggal.php'>
            <table class="bordered">
                <tr>
                    <th colspan=4><b>Laporan Per Tanggal</b></td></tr>
                <tr>
                    <td>Dari Tanggal</td><td>       
                        <?php
                        include '../koneksi/koneksi.php';
                        include 'proses/combotgl.php';
                        combotgl(1, 31, 'tgl_mulai', isset($tgl_skrg));
                        combonamabln(1, 12, 'bln_mulai', isset($bln_sekarang));
                        combothn(2000, isset($thn_sekarang), 'thn_mulai', isset($thn_sekarang));
                        ?>

                    </td>
                    <td>s/d Tanggal</td>
                    <td>
                        <?php
                        include '../koneksi/koneksi.php';
                        include 'proses/combotgl.php';
                        combotgl(1, 31, 'tgl_selesai', isset($tgl_skrg));
                        combonamabln(1, 12, 'bln_selesai', isset($bln_sekarang));
                        combothn(2000, isset($thn_sekarang), 'thn_selesai', isset($thn_sekarang));
                        ?>

                    </td>
                </tr>
                <tr><td colspan=4 style="text-align: center"><input type=submit value="Lihat Laporan"></td></tr>
            </table>
        </form>


                  <div id="bg_menu"> Laporan </div>
<div id="content_menu">
    <table class="bordered">
        <tr>
            <th>Laporan Hari Ini</th>
        </tr>
        <tr>
            <td style="text-align: center">
                <a href="modul/laporan/laporan_sekarang.php" target="_blank"><input type=button value='Lihat Laporan'></a>
            </td>
        </tr>
    </table>
    <br>
    <form method=POST action='export.php'>
        <table class="bordered">
            <tr>
                <th colspan=4><b>Laporan Per Tanggal</b></td></tr>
            <tr>
                <td>Dari Tanggal</td><td>       
                    <select name="tgl_surat" class="select2_single form-control" tabindex="-1" required>
                    <option>PILIH TAHUN</option>
                    <?php
                                for ($tgl_skrg=1;$tgl_skrg<=31;$tgl_skrg++)
                                      {
                                       echo  '<option value="'.$tgl_skrg.'">'.$tgl_skrg.'</option>';
                                      }
                    ?>
                    </select>
                    <select name="tgl_surat" class="select2_single form-control" tabindex="-1" required>
                    <option>PILIH TAHUN</option>
                    <?php
                                for ($bln_sekarang=1;$bln_sekarang<=12;$bln_sekarang++)
                                      {
                                       echo  '<option value="'.$bln_sekarang.'">'.$bln_sekarang.'</option>';
                                      }
                                      ?>
                    </select>
                    <select name="tgl_surat" class="select2_single form-control" tabindex="-1" required>
                    <option>PILIH TAHUN</option>
                    <?php
                                for ($thn_sekarang=2020;$thn_sekarang<=2030;$thn_sekarang++)
                                      {
                                       echo  '<option value="'.$thn_sekarang.'">'.$thn_sekarang.'</option>';
                                      }
                    ?>
                    </select>

                </td>
                
            <tr>
                <th colspan=4><b>Laporan Per Tanggal</b></td></tr>
            <tr>
                <td>s/d Tanggal</td>     <td> 
                    <select name="tgl_surat" class="select2_single form-control" tabindex="-1" required>
                    <option>PILIH TANGGAL</option>
                    <?php
                                for ($tgl_skrg=1;$tgl_skrg<=31;$tgl_skrg++)
                                      {
                                       echo  '<option value="'.$tgl_skrg.'">'.$tgl_skrg.'</option>';
                                      }
                    ?>
                    </select>
                    <select name="tgl_surat" class="select2_single form-control" tabindex="-1" required>
                    <option>PILIH BULAN</option>
                    <?php
                                for ($bln_sekarang=1;$bln_sekarang<=12;$bln_sekarang++)
                                      {
                                       echo  '<option value="'.$bln_sekarang.'">'.$bln_sekarang.'</option>';
                                      }
                                      ?>
                    </select>
                    <select name="tgl_surat" class="select2_single form-control" tabindex="-1" required>
                    <option>PILIH TAHUN</option>
                    <?php
                                for ($thn_sekarang=2020;$thn_sekarang<=2030;$thn_sekarang++)
                                      {
                                       echo  '<option value="'.$thn_sekarang.'">'.$thn_sekarang.'</option>';
                                      }
                    ?>
                    </select>

                </td>
            </tr>
            <tr><td colspan=4 style="text-align: center"><input type=submit value="Lihat Laporan"></td></tr>
        </table>
    </form>
</div>