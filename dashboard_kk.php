<?php
include"koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Koperasi Bhakti Sejahtera</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_kk.php?p=halaman_awal" style="background-color: rgb(50, 180, 255);">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo.png" style="width: 100%; height: 140px" >
        </div>
        <div class="sidebar-brand-text mx-3">KoperasiBS</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard_kk.php?p=halaman_awal">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard_kk.php?p=data_pinjaman_anggota">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Data Pinjaman Anggota</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard_kk.php?p=data_pinjaman_nasabah">
          <i class="fas fa-fw fa-columns"></i>
          <span>Data Pinjaman Nasabah</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-file"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="dashboard_kk.php?p=laporan_simpanan_anggota">Laporan Simpanan Anggota</a>
            <a class="collapse-item" href="dashboard_kk.php?p=laporan_pinjaman">Laporan Pinjaman Anggota</a>
            <a class="collapse-item" href="dashboard_kk.php?p=laporan_pinjaman_nasabah">Laporan Pinjaman Nasabah</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" style="background-color: #00BFFF;">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <?php 
                         include"koneksi.php";
                         $order_x="SELECT * FROM tbl_pinjaman_anggota WHERE status_pinjaman=''";
                          $query_order_x=mysqli_query($connect, $order_x);
                          $data_order_x=array();
                          while(($row_order_x=mysqli_fetch_array($query_order_x)) !=null){
                          $data_order_x[]=$row_order_x;
                          }
                          $count_x=count($data_order_x);

                          $order_y="SELECT * FROM tbl_pinjaman_nasabah WHERE status_pinjaman=''";
                          $query_order_y=mysqli_query($connect, $order_y);
                          $data_order_y=array();
                          while(($row_order_y=mysqli_fetch_array($query_order_y)) !=null){
                          $data_order_y[]=$row_order_y;
                          }
                          $count_y=count($data_order_y); 
                  ?>
                <span class="badge badge-danger badge-counter"><?php echo $count_x+$count_y;  ?></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Data Validasi Pengajuan Pinjaman
                </h6>
                <?php
                  include"koneksi.php";
                         $order_x="SELECT * FROM tbl_pinjaman_anggota WHERE status_pinjaman=''";
                          $query_order_x=mysqli_query($connect, $order_x);
                          
                          while($row_order_x=mysqli_fetch_array($query_order_x)){?>
                             <a class="dropdown-item d-flex align-items-center" href="dashboard_kk.php?p=data_pinjaman_anggota">
                              <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                  <i class="fas fa-file-alt text-white"></i>
                                </div>
                              </div>
                              <div>
                                <div class="small text-gray-500"><?php echo $row_order_x['tgl_pinjaman'];?></div>
                                <?php
                                  $query_anggota=mysqli_query($connect, "SELECT * FROM tbl_anggota WHERE id_anggota='".$row_order_x['id_anggota']."'");
                                  $data_anggota=mysqli_fetch_array($query_anggota);
                                ?>
                                <span class="font-weight-bold"><?php echo $row_order_x['id_anggota'];?>-<?php echo $data_anggota['nama_anggota'];?></span><br>
                                <span class="font-weight-bold">Jumlah Pinjaman: <?php 
                          $jp= $row_order_x['jumlah_pinjaman'];
                          echo "Rp.".number_format($jp, 2, ".", ".");?></span>
                              </div>
                            </a>

                          <?php } ?>

                          <?php
                  include"koneksi.php";
                         $order_y="SELECT * FROM tbl_pinjaman_nasabah WHERE status_pinjaman=''";
                          $query_order_y=mysqli_query($connect, $order_y);
                          
                          while($row_order_y=mysqli_fetch_array($query_order_y)){?>
                             <a class="dropdown-item d-flex align-items-center" href="dashboard_kk.php?p=data_pinjaman_nasabah">
                              <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                  <i class="fas fa-file-alt text-white"></i>
                                </div>
                              </div>
                              <div>
                                <div class="small text-gray-500"><?php echo $row_order_y['tgl_pinjam'];?></div>
                                <?php
                                  $query_anggota_a=mysqli_query($connect, "SELECT * FROM tbl_nasabah WHERE id_nasabah='".$row_order_y['id_nasabah']."'");
                                  $data_anggota_a=mysqli_fetch_array($query_anggota_a);
                                ?>
                                <span class="font-weight-bold"><?php echo $row_order_y['id_nasabah'];?>-<?php echo $data_anggota_a['nama_nasabah'];?></span><br>
                                <span class="font-weight-bold">Jumlah Pinjaman: <?php 
                          $jy= $row_order_y['jumlah_pinjaman'];
                          echo "Rp.".number_format($jy, 2, ".", ".");?></span>
                              </div>
                            </a>

                          <?php } ?>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <?php
                $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'Kepala Koperasi') {}?>
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $data['nama_user'];?> (<?php echo $data['level'];?>)</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="dashboard_kk.php?p=edit_uspas&id=<?php echo $data['id_user'];?>">
                  <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Username & Password
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="proses_logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <?php
          $pages_dir='Ketua Koperasi';
          if(!empty($_GET['p'])){
            $pages=scandir($pages_dir,0);
            unset($pages[0],$pages[1]);
            $p=$_GET['p'];
            if(in_array($p.'.php',$pages)){
              include($pages_dir.'/'.$p.'.php');
            }else{
              echo'';
            }
          }else{
            include($pages_dir.'/halaman_awal.php');
          }
        ?>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> Koperasi Bhakti Sejahtera
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>