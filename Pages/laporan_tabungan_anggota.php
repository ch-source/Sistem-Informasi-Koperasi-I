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
                      <label class="col-sm-2 col-form-label">Pilih Anggota/Nasabah</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="penerima" autofocus="autofocus" required="required">
                        <option value="" selected="selected">Pilih Anggota/Nasabah</option>
                         <?php 
                           $query="SELECT * FROM tbl_anggota_nasabah";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['nomor']."''>".$data1['nomor']."-".$data1['nama']."</option>";
                            }
                         ?>
                      </select>
                      </div>
                      
                        <label class="col-sm-1 col-form-label">P/T</label>
                        <div class="col-sm-2">
                            <select name="bulan" class="form-control" required="required">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                     
                        <div class="col-sm-2">
                            <select name="tahun" class="form-control" required="required">
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
                        <th>Anggota/Nasabah</th>
                        <th>Level</th>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Total Tabungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT * FROM tbl_anggota_nasabah ORDER BY level ASC";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['nomor'];?>-<?php echo $data['nama'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <?php
                          $query_a = "SELECT max(id_tabungan) as maxId FROM tbl_tabungan WHERE nomor='".$data['nomor']."'";
                            $hasil_a = mysqli_query($connect,$query_a);
                            $data_a = mysqli_fetch_array($hasil_a);

                            $query_b = "SELECT * FROM tbl_tabungan WHERE id_tabungan='".$data_a['maxId']."'";
                            $hasil_b = mysqli_query($connect,$query_b);
                            $data_b= mysqli_fetch_array($hasil_b);
                            
                            
                         ?>
                         <td><?php echo $data_b['periode'];?></td>
                         <td><?php echo $data_b['tahun'];?></td>
                          <?php
                          $query_x = "SELECT max(id_tabungan) as maxId FROM tbl_tabungan WHERE nomor='".$data['nomor']."'";
                            $hasil_x = mysqli_query($connect,$query_x);
                            $data_x = mysqli_fetch_array($hasil_x);

                            $query_y = "SELECT * FROM tbl_tabungan WHERE id_tabungan='".$data_x['maxId']."'";
                            $hasil_y = mysqli_query($connect,$query_y);
                            $data_y= mysqli_fetch_array($hasil_y);
                            if ($data_y['total_tabungan']!=0) 
                               echo "<td>Rp.".number_format($data_y['total_tabungan'], 2, ".", ".")."</td>";
                            
                         ?>
                     
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