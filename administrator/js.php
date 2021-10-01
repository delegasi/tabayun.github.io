<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Belajar</title>  
 </head>  
 <body>  
      <center><h3>Belajar Episode 1</h3>  
           <form>  
                <tr>  
                <table border="1">  
                     <td>Id Mobil </td>  
                     <?php   
                            include '../koneksi/koneksi.php'; 
                      ?>  
                     <td>
                         <select name="nama_js" id="nama_js" class="form-control" onchange='changeValue(this.value)' required >  
                          <?php   
                          $query = mysqli_query($db, "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js");  
                          $result = mysqli_query($db, "SELECT * FROM tb_jurusita LEFT JOIN tb_wilayah ON tb_jurusita.id_wilayah=tb_wilayah.id_wilayah ORDER BY id_js");  
                          $a          = "var no_hp_js = new Array();\n;";  
                          $b          = "var id_wilayah = new Array();\n;";  
                          while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="nama_js" value="'.$row['nama_js'] . '">' . $row['nama_js'] . '</option>';   
                          $a .= "no_hp_js['" . $row['nama_js'] . "'] = {no_hp_js:'" . addslashes($row['no_hp_js'])."'};\n";  
                          $b .= "id_wilayah['" . $row['nama_js'] . "'] = {id_wilayah:'" . addslashes($row['nama_wilayah'])."'};\n";  
                          }  
                          ?>  
                     </select></td>  
                </tr>  
                <tr>  
                     <td>Merek </td>  
                     <td><input type="text" name="no_hp_js" id="no_hp_js" readonly></td>  
                </tr>  
                <tr>  
                     <td>Warna </td>  
                     <td><input type="text" name="id_wilayah" id="id_wilayah" readonly></td>  
                </tr>  
                <script type="text/javascript">   
                          <?php   
                          echo $a;   
                          echo $b; ?>  
                          function changeValue(id){  
                            document.getElementById('no_hp_js').value = no_hp_js[id].no_hp_js;  
                            document.getElementById('id_wilayah').value = id_wilayah[id].id_wilayah;  
                          };  
                          </script>  
                </table>  
           </form>  
 </body>  
 </html>  