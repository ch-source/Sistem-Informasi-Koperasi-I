<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Penarikan Tabungan Nasabah</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Penarikan Tabungan Nasabah</li>
            </ol>
          </div>

          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Data Penarikan Nasabah</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_penarikan_nasabah.php" role="form" method="post">
                 <?php
                  include "koneksi.php";
                  $query = "SELECT max(id_penarikan_n) as maxId FROM tbl_penarikan_nasabah";
                  $hasil = mysqli_query($connect,$query);
                  $data = mysqli_fetch_array($hasil);
                  $idpenarikan = $data['maxId'];
                  $noUrut = (int) substr($idpenarikan, 3, 3);
                  $noUrut++;
                  $char = "PNK";
                  $idpenarikan= $char . sprintf("%03s", $noUrut);
              ?>
              <?php
              if(isset($_GET['notif'])){
                if($_GET['notif']=="berhasil"){
                  echo "<div class='alert alert-success alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=data_penarikan_tabungan_nasabah' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-check'></i> Data Penarikan <b>Berhasil Ditambahkan.</b>
                        </div>";
                }if($_GET['notif']=="gagal"){
                  echo "<div class='alert alert-danger alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=data_penarikan_tabungan_nasabah' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-warning'></i> Oppss!, Data Penarikan <b>Gagal Disimpan.</b>
                        </div>";
                }
              }
              ?>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Nasabah</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="nasabah" autofocus="autofocus" required="required">
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
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Periode</label>
                        <div class="col-sm-8">
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
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">
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
                      </div>
                    </div>
                  </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Penarikan</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah Penarikan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="jp"  required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="dashboard.php?p=data_tabungan_nasabah" class="btn btn-warning"><i></i> Tutup</a>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Penarikan</th>
                        <th>ID Nasabah</th>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Tgl. Penarikan</th>
                        <th>Jml. Penarikan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_user="SELECT * FROM tbl_penarikan_nasabah";
                       $sql_user=mysqli_query($connect, $query_user);
                       while ($data_user=mysqli_fetch_array($sql_user)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_user['id_penarikan_n'];?></td>
                         <td><?php echo $data_user['id_nasabah'];?></td>
                         <td><?php echo $data_user['periode_p'];?></td>
                         <td><?php echo $data_user['tahun_p'];?></td>
                         <td><?php echo $data_user['tgl_penarikan'];?></td>
                         <td><?php 
                           $jp= $data_user['jml_penarikan'];
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
        