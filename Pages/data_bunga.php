<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Bunga</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Bunga</li>
            </ol>
          </div>

          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Bunga</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_bunga.php" role="form" method="post">
                 <?php
              include "koneksi.php";
              $query = "SELECT max(id_bunga) as maxId FROM tbl_bunga";
              $hasil = mysqli_query($connect,$query);
              $data = mysqli_fetch_array($hasil);
              $idbunga = $data['maxId'];
              $noUrut = (int) substr($idbunga, 3, 3);
              $noUrut++;
              $char = "BNG";
              $idbunga= $char . sprintf("%03s", $noUrut);
              ?>
              <?php
              if(isset($_GET['notif'])){
                if($_GET['notif']=="berhasil"){
                  echo "<div class='alert alert-success alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=data_bunga' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-check'></i> Data Bunga <b>Berhasil Ditambahkan.</b>
                        </div>";
                }if($_GET['notif']=="gagal"){
                  echo "<div class='alert alert-danger alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=data_bunga' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-warning'></i> Oppss!, Data Bunga <b>Gagal Disimpan.</b>
                        </div>";
                }if($_GET['notif']=="ubah-berhasil"){
                  echo "<div class='alert alert-success alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=data_bunga' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-check'></i> Data Bunga <b>Berhasil Diubah.</b>
                        </div>";
                }
              }
              ?>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga Menurun (%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="bm" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga Tetap(%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="bt" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Bunga</th>
                        <th>Bunga Menurun (%)</th>
                        <th>Bunga Tetap (%)</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_user="SELECT * FROM tbl_bunga";
                       $sql_user=mysqli_query($connect, $query_user);
                       while ($data_user=mysqli_fetch_array($sql_user)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_user['id_bunga'];?></td>
                         <td><?php echo $data_user['bunga_m'];?></td>
                         <td><?php echo $data_user['bunga_t'];?></td>
                         <td style="text-align: center;"><a href="dashboard.php?p=edit_bunga&id=<?php echo $data_user['id_bunga'];?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
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