 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Sisa Angsuran Pinjaman Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Sisa Angsuran Pinjaman Anggota</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark" style="text-align: right;"></h6><a href="dashboard.php?p=data_pinjaman_anggota" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table align-items-center" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID (Anggota)</th>
                        <th>Data Sisa Angsuran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_pinjaman_anggota";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <?php
                        $query_anggota="SELECT*FROM tbl_anggota WHERE id_anggota='".$data['id_anggota']."'";
                      $sql_anggota=mysqli_query($connect, $query_anggota);
                      $data_anggota=mysqli_fetch_array($sql_anggota) ?>
                        <td><?php echo $data['id_anggota'];?>-<?php echo $data_anggota['nama_anggota'];?>
                        </td>
                        <td>
                          <table class="table table-bordered" style="font-size: 12px;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>ID Pembayaran</th>
                                <th>Tgl. Pembayaran</th>
                                <th>Jumlah Pinjaman</th>
                                <th>Jangka Waktu</th>
                                <th>Angsuran Ke-</th>
                                <th>Sisa Angsuran</th>
                                <th>Jml. Sisa Angsuran</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_pembayaran_pinjaman WHERE id_pinjaman='".$data['id_pinjaman']."'";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <td><?php echo $data_a['id_pembayaran'];?></td>
                                
                                <td><?php echo $data_a['tgl_pembayaran'];?></td>
                                <td><?php 
                                  $jp= $data_a['jumlah_pinjaman'];
                                  echo "Rp.".number_format($jp, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php echo $data_a['jangka_waktu'];?></td>
                                <td><?php echo $data_a['angsuran_k'];?></td>
                                <td><?php echo $data_a['sisa_angsuran'];?></td>
                                <td><?php 
                                  $tt= $data_a['total_tunggakan'];
                                  echo "Rp.".number_format($tt, 2, ".", ".");
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