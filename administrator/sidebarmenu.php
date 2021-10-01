<?php 
	 include '../koneksi/koneksi.php';
			$sql  		= "SELECT * FROM tb_admin where id_admin='".$_SESSION['id']."'";                        
			$query  	= mysqli_query($db, $sql);
			$data 		= mysqli_fetch_array($query);
?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="../template/img/majalengka.png" height="50" width="50"></i> <span> SIMORETA</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../template/images/<?php echo $data['gambar']; ?>" height="55" width="55" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>SELAMAT DATANG</span>
                <h2 style="text-transform:uppercase"><?php echo $_SESSION['nama'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                    <a><i class="fa fa-file-text"></i> KATEGORI DELEGASI <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="delegasimasuk.php"><i class="fa fa-inbox"></i>DELEGASI - TABAYUN</a></li>
                      <!-- <li><a href="delegasikeluar.php"><i class="fa fa-send"></i>DELEGASI KELUAR</a></li> -->
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-users"></i> JURUSITA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="datajurusita.php"><i class="fa fa-inbox"></i>DATA JURUSITA</a></li>
                      <li><a href="datawilayah.php"><i class="fa fa-inbox"></i>DATA WILAYAH JS</a></li>
                    </ul>
                  </li>
                  <!-- <li>
                    <a><i class="fa fa-user"></i> Tambah User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="datauser.php"><i class="fa fa-inbox"></i>Data Bagian</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
