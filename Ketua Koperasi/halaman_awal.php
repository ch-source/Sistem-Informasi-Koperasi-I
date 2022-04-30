<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Dashboard Ketua Koperasi</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Dashboard</li>
            </ol>
          </div>
          <?php
              if(isset($_GET['notif'])){
                if($_GET['notif']=="login-sukses"){
                  echo "<div class='alert alert-primary alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard_kk.php?p=halaman_awal' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-check'></i> Anda Berhasil Login.</b>
                        </div>";
                }
              }
              ?>
<div class="row mb-3">
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH ANGGOTA</div>
                      <?php 
                         include"koneksi.php";
                         $order="SELECT * FROM tbl_anggota WHERE status='Aktif'";
                          $query_order=mysqli_query($connect, $order);
                          $data_order=array();
                          while(($row_order=mysqli_fetch_array($query_order)) !=null){
                          $data_order[]=$row_order;
                          }
                          $count=count($data_order); 
                         ?>
                      <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count;  ?> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info" style="margin-top: 18px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH NASABAH</div>
                      <?php 
                         include"koneksi.php";
                         $order_a="SELECT * FROM tbl_nasabah";
                          $query_order_a=mysqli_query($connect, $order_a);
                          $data_order_a=array();
                          while(($row_order_a=mysqli_fetch_array($query_order_a)) !=null){
                          $data_order_a[]=$row_order_a;
                          }
                          $count_a=count($data_order_a); 
                         ?>
                      <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_a;  ?> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-success" style="margin-top: 18px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">TABUNGAN</div>
                      <?php 
                         include"koneksi.php";
                         $order_d="SELECT * FROM tbl_tabungan";
                          $query_order_d=mysqli_query($connect, $order_d);
                          $data_order_d=array();
                          while(($row_order_d=mysqli_fetch_array($query_order_d)) !=null){
                          $data_order_d[]=$row_order_d;
                          }
                          $count_d=count($data_order_d); 
                         ?>
                      
                     <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_d;  ?> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">PINJAMAN</div>
                      <?php 
                         include"koneksi.php";
                         $order_b="SELECT * FROM tbl_pinjaman_anggota";
                          $query_order_b=mysqli_query($connect, $order_b);
                          $data_order_b=array();
                          while(($row_order_b=mysqli_fetch_array($query_order_b)) !=null){
                          $data_order_b[]=$row_order_b;
                          }
                          $count_b=count($data_order_b); 
                         ?>
                         <?php 
                         include"koneksi.php";
                         $order_c="SELECT * FROM tbl_pinjaman_nasabah";
                          $query_order_c=mysqli_query($connect, $order_c);
                          $data_order_c=array();
                          while(($row_order_c=mysqli_fetch_array($query_order_c)) !=null){
                          $data_order_c[]=$row_order_c;
                          }
                          $count_c=count($data_order_c); 
                         ?>
                      
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="h6 text-info mr-2"><i class="fa fa-users mr-1"></i><?php echo $count_b;  ?> Orang</span>
                        <span>ANGGOTA</span>
                      </div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="h6 text-success mr-2"><i class="fas fa-users mr-1"></i><?php echo $count_c;  ?> Orang</span>
                        <span>NASABAH</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card mb-12">
                <div class="card-body" style="background-color: #00CED1; text-align: center;">
                  <h4>Selamat Datang Di Sistem Informasi Simpan Pinjam Pada Koperasi Bhakti Sejahtera</h4>  
                </div>
              </div>
            </div>
          </div>
          
        <!--Row-->

        </div>
        <!---Container Fluid-->