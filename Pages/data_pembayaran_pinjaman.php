 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Pembayaran Pinjaman Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pembayaran Pinjaman Anggota</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title" style="text-align: right;"></b><a href="dashboard.php?p=data_pinjaman_anggota" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/slip_pembayaran.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Anggota</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="anggota" autofocus="autofocus" required="required">
                        <option value="" selected="selected">Pilih Anggota</option>
                         <?php 
                           $query="SELECT * FROM tbl_anggota WHERE status='Aktif'";
                           $sql=mysqli_query($connect, $query);
                           while($data=mysqli_fetch_array($sql)){
                           echo"<option value='".$data['id_anggota']."''>".$data['id_anggota']."-".$data['nama_anggota']."</option>";
                            }
                         ?>
                      </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
                        <th>Data Pembayaran</th>
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
                        <td><?php echo $data['id_pinjaman'];?> (<?php echo $data['id_anggota'];?>-<?php echo $data_anggota['nama_anggota'];?>)
                        </td>
                        <td>
                          <table class="table table-bordered" style="font-size: 12px;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>ID Pembayaran</th>
                                <th>Tgl. Pembayaran</th>
                                <th>Jumlah Pinjaman</th>
                                <th>Jenis Bunga</th>
                                <th>Bunga</th>
                                <th>Jangka Waktu</th>
                                <th>Angsuran Ke-</th>
                                <th>Sisa Angsuran</th>
                                <th>Angsuran Pokok</th>
                                <th>Angsuran Bunga</th>
                                <th>Total Angsuran</th>
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
                                <td><?php echo $data_a['jenis_bunga'];?></td>
                                <td><?php echo $data_a['bunga'];?>%</td>
                                <td><?php echo $data_a['jangka_waktu'];?></td>
                                <td><?php echo $data_a['angsuran_k'];?></td>
                                <td><?php echo $data_a['sisa_angsuran'];?></td>
                                <td><?php 
                                  $ap= $data_a['angsuran_pokok'];
                                  echo "Rp.".number_format($ap, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php 
                                  $ab= $data_a['angsuran_bunga'];
                                  echo "Rp.".number_format($ab, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php 
                                  $ta= $data_a['total_angsuran'];
                                  echo "Rp.".number_format($ta, 2, ".", ".");
                                  ?> 
                                </td>
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