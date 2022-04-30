 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Pengajuan Pinjaman Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengajuan Pinjaman Anggota</li>
            </ol>
          </div>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_a"
                    id="#myBtn_a" style="margin-bottom: 5px;"> <i class="fa fa-plus"></i>
                    Input Pengajuan Pinjaman Anggota
          </button>
          <a href="dashboard.php?p=data_pembayaran_pinjaman" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fa fa-folder"></i> Data Pembayaran</a>
          <a href="dashboard.php?p=data_tunggakan" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fa fa-folder"></i> Data Sisa Angsuran</a>
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
                  <form method="post" action="dashboard.php?p=input_pinjaman_anggota">
                    <div class="form-group">
                      <label class="col-form-label">Pilih Anggota</label>
                      
                        <select name="anggota" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Anggota-</option>
                          <?php 
                           $query="SELECT * FROM tbl_anggota";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['id_anggota']."''>".$data1['id_anggota']."-".$data1['nama_anggota']."</option>";
                            }
                         ?>
                        </select>
                      
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Pilih Jaminan</label>
                      
                        <select name="jenis" class="form-control" required="required">
                          <option value="" selected="selected">-Pili Jaminan-</option>
                          <option value="BPKB Mobil">BPKB Mobil</option>
                          <option value="BPKB Motor">BPKB Motor</option>
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
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Pinjaman</th>
                        <th>Peminjam</th>
                        <th>Tgl. Pinjaman</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Status Peminjam</th>
                        <th>Jaminan</th>
                        <th>Jenis Bunga</th>
                        <th>Bunga</th>
                        <th>Jangka Waktu</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Status Pinjaman</th>
                        <th style="text-align: center;">Status Pembayaran</th>
                        <th>Opsi</th>
                        <th>Bayar</th>
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
                        <td><?php echo $data['id_pinjaman'];?></td>
                        <?php
                        $query_anggota="SELECT*FROM tbl_anggota WHERE id_anggota='".$data['id_anggota']."'";
                      $sql_anggota=mysqli_query($connect, $query_anggota);
                      $data_anggota=mysqli_fetch_array($sql_anggota) ?>
                        <td><?php echo $data['id_anggota'];?>-<?php echo $data_anggota['nama_anggota'];?>
                        </td>
                        <td><?php echo $data['tgl_pinjaman'];?></td>
                        <td><?php echo $data['no_telepon'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['pekerjaan'];?></td>
                        <td><?php echo $data['status_peminjam'];?></td>
                        <td><?php echo $data['jenis_jaminan'];?></td>
                        <td><?php echo $data['jenis_bunga'];?></td>
                        <td><?php echo $data['bunga'];?> %</td>
                        <td><?php echo $data['jangka_waktu'];?></td>
                        <td><?php 
                          $jp= $data['jumlah_pinjaman'];
                          echo "Rp.".number_format($jp, 2, ".", ".");
                          ?> 
                        </td>
                        <td><?php echo $data['status_pinjaman'];?></td>
                        <td><?php echo $data['status'];?></td>
                         <td><a href="dashboard.php?p=detail_pinjaman_anggota&id=<?php echo $data['id_pinjaman'];?>" class="btn btn-info btn-sm" style="margin-bottom: 2px;"><i class="fa fa-folder-open"></i></a>
                         </td>
                         <td>
                         <?php
                         if($data['jumlah_pinjaman']==0){
                         echo "";
                         }else{
                          echo"<a href='dashboard.php?p=input_pembayaran_pinjaman&id=".$data['id_pinjaman']."' class='btn btn-warning btn-sm' ><i class='fa fa-plus'></i></a>";
                         }
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
        
