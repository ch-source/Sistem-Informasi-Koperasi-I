 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Pengajuan Pinjaman Nasabah</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengajuan Pinjaman Nasabah</li>
            </ol>
          </div>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_a"
                    id="#myBtn_a" style="margin-bottom: 5px;"> <i class="fa fa-plus"></i>
                    Input Pengajuan Pinjaman Nasabah
          </button>
          <a href="dashboard.php?p=data_pembayaran_pinjaman_nasabah" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fa fa-folder"></i> Data Pembayaran</a>
          <a href="dashboard.php?p=data_tunggakan_nasabah" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fa fa-folder"></i> Data Sisa Angsuran</a>
          <div class="modal fade" id="exampleModal_a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                  <form method="post" action="dashboard.php?p=input_pinjaman_nasabah">
                    <div class="form-group">
                      <label class="col-form-label">Pilih Nasabah</label>
                      
                        <select name="nasabah" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Nasabah-</option>
                          <?php 
                           $query="SELECT * FROM tbl_nasabah WHERE status_anggota=''";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['id_nasabah']."''>".$data1['id_nasabah']."-".$data1['nama_nasabah']."</option>";
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
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Pinjaman</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Jenis Jaminan</th>
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
                      $query="SELECT*FROM tbl_pinjaman_nasabah";
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
                        <td><?php echo $data['tgl_pinjam'];?></td>
                        <td><?php echo $data['jenis_jaminan'];?></td>
                        <?php
                          $query_bunga=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE id_bunga_x='".$data['jenis_bunga']."'");
                          $data_bunga=mysqli_fetch_array($query_bunga);
                        ?>
                        <td><?php echo $data_bunga['ket_bunga'];?></td>
                        <td><?php echo $data['bunga'];?>%</td>
                        <td><?php echo $data['jangka_waktu'];?></td>
                        <td><?php 
                          $jp= $data['jumlah_pinjaman'];
                          echo "Rp.".number_format($jp, 2, ".", ".");
                          ?> 
                        </td>
                        <td><?php echo $data['status_pinjaman'];?></td>
                        <td><?php echo $data['status'];?></td>
                         <td><a href="dashboard.php?p=detail_pinjaman_nasabah&id=<?php echo $data['id_pinjaman'];?>" class="btn btn-info btn-sm"><i class="fa fa-folder-open"></i></a>
                         </td>
                         <td>
                          <?php
                         if($data['jumlah_pinjaman']==0){
                         echo "";
                         }else{
                          
                          echo"<a href='dashboard.php?p=input_pembayaran_pinjaman_nasabah&id=".$data['id_pinjaman']."' class='btn btn-warning btn-sm' ><i class='fa fa-plus'></i></a>";
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
        
