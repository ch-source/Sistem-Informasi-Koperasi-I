<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Tabungan Nasabah</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Tabungan Nasabah</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Tabungan Nasabah</b>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/laporan_tabungan_nasabah.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilih Nasabah</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="penerima" autofocus="autofocus" required="required">
                        <option value="" selected="selected">Pilih Nasabah</option>
                         <?php 
                           $query="SELECT * FROM tbl_nasabah";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['id_nasabah']."''>".$data1['id_nasabah']."-".$data1['nama_nasabah']."</option>";
                            }
                         ?>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Tabungan Nasabah</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Tabungan</th>
                        <th>Nama Penerima</th>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Tanggal Setor</th>
                        <th>Nama Penyetor</th>
                        <th>Jumlah Tabungan</th>
                        <th>Bunga (%)</th>
                        <th>Jumlah Bunga</th>
                        <th>Total Tabungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_tabungan_nasabah ORDER BY id_nasabah DESC";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_tabungan_n'];?></td>
                        <td><?php echo $data['id_nasabah'];?></td>
                        <td><?php echo $data['periode'];?></td>
                        <td><?php echo $data['tahun'];?></td>
                        <td><?php echo $data['nama_penyetor'];?></td>
                        <td><?php echo $data['tgl_setoran'];?></td>
                        <td><?php 
                          $jm= $data['jml_tabungan'];
                          echo "Rp.".number_format($jm, 2, ".", ".");
                          ?> 
                        </td>
                        <td><?php echo $data['bunga_tn'];?></td>
                        <td><?php echo $data['jml_bunga'];?></td>
                        <td><?php 
                          $tt= $data['total_tabungan'];
                          echo "Rp.".number_format($tt, 2, ".", ".");
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
        