<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Data Pinjaman</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Data Pinjaman</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Data Pinjaman</b>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/laporan_pinjaman_nasabah.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilih Nasabah</label>
                      <div class="col-sm-3">
                         <select name="bulan" class="form-control" required="required">
                                <option value="January">Januari</option>
                                <option value="February">Februari</option>
                                <option value="March">Maret</option>
                                <option value="April">April</option>
                                <option value="May">Mei</option>
                                <option value="June">Juni</option>
                                <option value="July">Juli</option>
                                <option value="August">Agustus</option>
                                <option value="September">September</option>
                                <option value="October">Oktober</option>
                                <option value="November">November</option>
                                <option value="December">Desember</option>
                            </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-3">
                         <select name="tahun" class="form-control">
                                                  <?php
                                                  $mulai= date('Y') - 50;
                                                  for($i = $mulai; $i<$mulai + 100;$i++){
                                                  $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                  echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                  }
                                                  ?>
                                              </select>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Data Pinjaman</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <tr>
                        <th>No</th>
                        <th>ID Pinjaman</th>
                        <th>Peminjam</th>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Jenis Jaminan</th>
                        <th>Bunga</th>
                        <th>Jangka Waktu</th>
                        <th>Jumlah Pinjaman</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_pinjaman_nasabah WHERE status_pinjaman='Sudah Dikonfirmasi'";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_pinjaman'];?></td>
                      <?php
                        $query_nasabah="SELECT*FROM tbl_nasabah WHERE id_nasabah='".$data['id_nasabah']."'";
                      $sql_nasabah=mysqli_query($connect, $query_nasabah);
                      $data_nasabah=mysqli_fetch_array($sql_nasabah) ?>
                        <td><?php echo $data['id_nasabah'];?>-<?php echo $data_nasabah['nama_nasabah'];?>
                        </td>
                        <td><?php 
                        if ($data['periode']=='January') {
                          $periode='1';
                        }elseif ($data['periode']=='February') {
                          $periode='2';
                        }elseif ($data['periode']=='March') {
                          $periode='3';
                        }elseif ($data['periode']=='April') {
                          $periode='4';
                        }elseif ($data['periode']=='May') {
                          $periode='5';
                        }elseif ($data['periode']=='June') {
                          $periode='6';
                        }elseif ($data['periode']=='July') {
                          $periode='7';
                        }elseif ($data['periode']=='August') {
                          $periode='8';
                        }elseif ($data['periode']=='September') {
                          $periode='9';
                        }elseif ($data['periode']=='October') {
                          $periode='10';
                        }elseif ($data['periode']=='November') {
                          $periode='11';
                        }elseif ($data['periode']=='December') {
                          $periode='12';
                        }
                        echo $periode;?></td>
                        <td><?php echo $data['tahun'];?></td>
                        <td><?php echo $data['tgl_pinjam'];?></td>
                        <td><?php echo $data['jenis_jaminan'];?></td>
                        <td><?php echo $data['bunga'];?>%</td>
                        <td><?php echo $data['jangka_waktu'];?></td>
                        <td><?php 
                          $jp= $data['jumlah_pinjaman'];
                          echo "Rp.".number_format($jp, 2, ".", ".");
                          ?> 
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
        <!---Container Fluid-->