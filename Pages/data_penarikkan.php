<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Penarikan Tabungan</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Penarikan Tabungan </li>
            </ol>
          </div>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn" style="margin-bottom: 10px;"> <i class="fa fa-plus"></i>
                    Input Penarikkan
          </button>
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Pilih Nasabah/Anggota</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="dashboard.php?p=input_penarikkan">
                    <div class="form-group">
                      <label class="col-form-label">Pilih Nasabah/Anggota</label>
                      
                        <select name="nama" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Nasabah/Anggota-</option>
                          <?php 
                           $query="SELECT * FROM tbl_anggota_nasabah";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['nomor']."''>".$data1['nomor']."-".$data1['nama']." (".$data1['level'].")</option>";
                            }
                         ?>
                        </select>
                      
                    </div>
                    
                        <button type="submit" name="pilih" class="btn btn-primary">Selanjutnya.....</button>
                      
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
                  <h6 class="m-0 font-weight-bold text-dark">Tabel Data Penarikan Tabungan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Penarikan</th>
                        <th>ID Anggota/Nasabah</th>
                        <th>Tgl. Penarikan</th>
                        <th>Jml. Penarikan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_user="SELECT * FROM tbl_penarikan";
                       $sql_user=mysqli_query($connect, $query_user);
                       while ($data_user=mysqli_fetch_array($sql_user)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_user['id_penarikan'];?></td>
                         <td><?php echo $data_user['id_anggota'];?></td>
                        
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
        