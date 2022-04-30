 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Tabungan Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Tabungan Anggota</li>
            </ol>
          </div>
          <a href="dashboard.php?p=input_tabungan_anggota" class="btn btn-success" style="margin-bottom: 3px; "><i class="fa fa-edit"></i> INPUT TABUNGAN BARU</a>
          <a href="dashboard.php?p=data_penarikan_tabungan_anggota" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-table"></i> DATA PENARIKAN TABUNGAN</a>
          <a href="dashboard.php?p=rekaptulasi_tabungan_anggota" class="btn btn-warning" style="margin-bottom: 3px; "><i class="fa fa-eye"></i> LIHAT REKAPITULASI TABUNGAN</a>
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Tabungan Anggota</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Anggota</th>
                        <th>Data Tabungan</th>
                        <th>Data Tabungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_anggota   WHERE status='Aktif'";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_anggota'];?>-<?php echo $data['nama_anggota'];?></td>
                        <td>
                          <table class="table table-bordered" style="font-size: 12px;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>ID Tabungan</th>
                                <th>Periode</th>
                                <th>Tahun</th>
                                <th>Tanggal Setor</th>
                                <th>Nama Penyetor</th>
                                <th>Jumlah Tabungan</th>
                                <th>Bunga (%)</th>
                                <th>Jumlah Bunga</th>
                                <th>Total Tabungan</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_tabungan_anggota WHERE id_anggota='".$data['id_anggota']."'";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <td><?php echo $data_a['id_tabungan_a'];?></td>
                                <td><?php echo $data_a['periode_a'];?></td>
                                <td><?php echo $data_a['tahun_a'];?></td>
                                <td><?php echo $data_a['tanggal_setor'];?></td>
                                <td><?php echo $data_a['nama_penyetor'];?></td>
                                <td><?php 
                                  $jma= $data_a['jumlah_tabungan'];
                                  echo "Rp.".number_format($jma, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php echo $data_a['bunga_ta'];?></td>
                                <td><?php 
                                  $jb= $data_a['jml_bunga'];
                                  echo "Rp.".number_format($jb, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php 
                                  $tt= $data_a['total_tabungan'];
                                  echo "Rp.".number_format($tt, 2, ".", ".");
                                  ?> 
                                </td>
                                <td>
                                  <?php
                                   $tgl=date("Y");
                                   if ($data_a['tahun_a']==$tgl) {
                                     
                                      $query_panggil=mysqli_query($connect, "SELECT * FROM tbl_rekap_tabungan_anggota WHERE tahun_a='".$data_a['tahun_a']."' AND id_anggota='".$data_a['id_anggota']."'");
                                      $data_panggil=mysqli_fetch_array($query_panggil);

                                      if ($data_a['total_tabungan']==$data_panggil['ttl_tabungan']) {
                                       
                                       echo"<a href='dashboard.php?p=input_tabungan_anggota2&id=".$data_a['id_tabungan_a']."' class='btn btn-primary btn-sm'><i class='fa fa-plus'></i> Tambah Tabungan</a>";
                                      }else{
                                        echo"-";
                                      }
                                    }else{
                                      echo"-";
                                    }
                                  ?>
                                  
                                </td>
                              </tr>
                              <?php $no_a++;}?>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <?php $no++;}
                      ?>
                    </tbody>
                   
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>