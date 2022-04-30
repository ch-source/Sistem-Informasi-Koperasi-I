 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Simpanan/Tabungan Nasabah & Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Simpanan/Tabungan Nasabah & Anggota</li>
            </ol>
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn" style="margin-bottom: 10px;"> <i class="fa fa-plus"></i>
                    Input Tabungan Nasabah
          </button>
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_a"
                    id="#myBtn_a" style="margin-bottom: 10px;"> <i class="fa fa-plus"></i>
                    Input Tabungan / Simpanan Anggota
          </button>
           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Pilih Nasabah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="dashboard.php?p=input_tabungan">
                    <div class="form-group">
                      <label class="col-form-label">Pilih Nasabah</label>
                      
                        <select name="nasabah" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Nasabah-</option>
                          <?php 
                           $query="SELECT * FROM tbl_anggota_nasabah WHERE level='Nasabah'";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['nomor']."''>".$data1['nomor']."-".$data1['nama']."</option>";
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
           <div class="modal fade" id="exampleModal_a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Pilih Anggota</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="dashboard.php?p=input_tabungan_a">
                    <div class="form-group">
                      <label class="col-form-label">Pilih Anggota</label>
                      
                        <select name="anggota" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Anggota-</option>
                          <?php 
                           $query="SELECT * FROM tbl_anggota_nasabah WHERE level='Anggota'";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['nomor']."''>".$data1['nomor']."-".$data1['nama']."</option>";
                            }
                         ?>
                        </select>
                      
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Opsi</label>
                      
                        <select name="jenis" class="form-control" required="required">
                          <option value="" selected="selected">-Pili Jenis-</option>
                          <option value="Tabungan" selected="selected">Tabungan</option>
                          <option value="simpanan" selected="selected">Simpanan Wajib</option>
                         ?>
                        </select>
                      
                    </div>
                        <button type="submit" name="pilih" class="btn btn-success">Selanjutnya.....</button>
                  </form>
                </div>
                <div class="modal-footer">
                
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Simpanan/Tabungan Nasabah & Anggota</h6>
                </div>
                <div class="card-body">
                  <table class="table" id="dataTableHover" style="font-size: 13px;">
                    <thead >
                      <tr>
                        <th>No</th>
                        <th>Anggota/Nasabah</th>
                        <th>Level</th>
                        <th>Total Tabungan</th>
                        <th>Tabungan</th>
                        <th>Total SW</th>
                        <th>SW</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_anggota_nasabah ORDER BY level ASC";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['nomor'];?>-<?php echo $data['nama'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <?php
                          $query_x = "SELECT max(id_tabungan) as maxId FROM tbl_tabungan WHERE nomor='".$data['nomor']."'";
                            $hasil_x = mysqli_query($connect,$query_x);
                            $data_x = mysqli_fetch_array($hasil_x);

                            $query_y = "SELECT * FROM tbl_tabungan WHERE id_tabungan='".$data_x['maxId']."'";
                            $hasil_y = mysqli_query($connect,$query_y);
                            $data_y= mysqli_fetch_array($hasil_y);
                            if ($data_y['total_tabungan']!=0) {
                               echo "<td>Rp.".number_format($data_y['total_tabungan'], 2, ".", ".")."</td>";
                              
                                echo"<td><a href='dashboard.php?p=detail_tabungan&id=".$data['nomor']."' class='btn btn-info btn-sm'><i class='fa fa-folder-open'></a></td>";
                            }else{
                              echo"<td style='color:red; '>Belum Memiliki Tabungan</td>";
                              echo"<td style='color:red;'></td>";
                              
                            }
                            
                         ?>

                          <?php
                          $cek = mysqli_query($connect, "SELECT * FROM tbl_simpanan_a WHERE id_anggota = '".$data['nomor']."'");
                          $result = mysqli_num_rows($cek);
                          $data_cek = mysqli_fetch_array($cek);
                          if ($result > 0) {
                              $result_x="SELECT SUM(simpanan_wajib) AS simpanan_wajib FROM  tbl_simpanan_a WHERE id_anggota='".$data['nomor']."'";
                              $sd=mysqli_query($connect, $result_x);
                              while($hasil=mysqli_fetch_object($sd)){
                                echo"<td>Rp. ".number_format($hasil->simpanan_wajib, 2, ".", ".")."</td>";
                                echo"<td><a href='dashboard.php?p=detail_simpanan&id=".$data['nomor']."' class='btn btn-success btn-sm'><i class='fa fa-folder-open'></a></td>";
                              }
                            }else{
                              if ($data['level']=='Anggota') {
                                echo"<td style='color:red;'>Belum Memiliki Simpanan Wajib</td>
                                ";
                                 echo"<td style='color:red;'></td>";
                              }else{
                                echo"<td style='color:red;'></td>";
                                echo"<td style='color:red;'></td>";
                              }
                              
                             
                            }

                            
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