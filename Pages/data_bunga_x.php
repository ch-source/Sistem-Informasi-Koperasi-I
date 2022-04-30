<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Bunga Simpanan & Pinjaman</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Bunga Simpanan & Pinjaman</li>
            </ol>
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn" style="margin-bottom: 10px;">
                    Input Data Bunga
          </button>
         
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Pilih Jenis Bunga</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="dashboard.php?p=input_bunga_x" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Bunga</label>
                      <div class="col-sm-9">
                        <select name="jenis" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Jenis Bunga-</option>
                          <option value="BS">Bunga Simpanan</option>
                          <option value="BP">Bunga Pinjaman</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                      </div>
                      <div class="col-sm-9">
                        <button type="submit" name="pilih" class="btn btn-primary">Selanjutnya.....</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Tabel Data Bunga Simpanan & Pinjaman</h6>
                </div>
                <div class="card-body">
                  
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Bunga</th>
                        <th>Jenis Bunga</th>
                        <th>Bunga(%)</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_user="SELECT * FROM tbl_bunga_x";
                       $sql_user=mysqli_query($connect, $query_user);
                       while ($data_user=mysqli_fetch_array($sql_user)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_user['id_bunga_x'];?></td>
                         <?php
                          if ($data_user['jenis_bunga']=='BS') {
                            $x="Bunga Simpanan";
                          }elseif ($data_user['jenis_bunga']=='BP'){
                            $x="Bunga Pinjaman";
                          }
                          ?>
                        <td><?php echo $data_user['jenis_bunga'];?> (<?php echo $x;?>)</td>
                         <td><?php echo $data_user['bunga_a'];?></td>
                         <td><?php echo $data_user['ket_bunga'];?></td>
                         <td style="text-align: center;"><a href="dashboard.php?p=edit_bunga_x&id=<?php echo $data_user['id_bunga_x'];?>&ket=<?php echo $data_user['ket_bunga'];?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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