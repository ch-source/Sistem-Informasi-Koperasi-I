<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Tabungan Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Tabungan Anggota</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Tabungan Anggota</b>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/laporan_tabungan_anggota.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilih Anggota</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="penerima" autofocus="autofocus" required="required">
                        <option value="" selected="selected">Pilih Anggota</option>
                         <?php 
                           $query="SELECT * FROM tbl_anggota WHERE status='Aktif'";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['id_anggota']."''>".$data1['id_anggota']."-".$data1['nama_anggota']."</option>";
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
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Tabungan Anggota</h6>
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
                      $query="SELECT*FROM tbl_tabungan_anggota ORDER BY id_anggota DESC";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_tabungan_a'];?></td>
                        <td><?php echo $data['id_anggota'];?></td>
                        <td><?php echo $data['periode_a'];?></td>
                        <td><?php echo $data['tahun_a'];?></td>
                        <td><?php echo $data['tanggal_setor'];?></td>
                        <td><?php echo $data['nama_penyetor'];?></td>
                        <td><?php 
                          $jma= $data['jumlah_tabungan'];
                          echo "Rp.".number_format($jma, 2, ".", ".");
                          ?> 
                        </td>
                        <td><?php echo $data['bunga_ta'];?></td>
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