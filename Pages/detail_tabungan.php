<style>

</style>          

            <?php
              include"koneksi.php";
              $id=$_GET['id'];
              $query_x=mysqli_query($connect,"SELECT * FROM tbl_anggota_nasabah WHERE nomor='$id'");
              $data_x=mysqli_fetch_array($query_x);
            ?>
              <div class="col-xl-12">
               <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Detail Tabungan <?php echo $data_x['level'];?></h6><a href="dashboard.php?p=data_tabungan" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body" style="overflow: auto;">
                  <div class="row" >
                    <div class="col-sm-2">ID <?php echo $data_x['level'];?></div>
                    <div class="col-sm-10" style="text-align: left;">: <?php echo $data_x['nomor'];?></div>
                  </div>
                  <div class="row" >
                    <div class="col-sm-2">Nomor Identitas</div>
                    <div class="col-sm-10" style="text-align: left;">: <?php echo $data_x['no_identitas'];?></div>
                  </div>
                  <div class="row" >
                    <div class="col-sm-2">Nama Lengkap</div>
                    <div class="col-sm-10" style="text-align: left;">: <?php echo $data_x['nama'];?></div>
                  </div>
               
                <br>
                 
                    <h6>Data Tabungan <?php echo $data_x['level'];?></h6>
                      <table border="1" style="font-size: 14px; width: 100%;">
                            <thead style="text-align: center;">
                              <tr style="text-align: center;">
                                <th>No</th>
                                <th>ID Tabungan</th>
                                <th>Tanggal Setor</th>
                                <th>Jumlah Tabungan</th>
                                <th>Bunga (%)</th>
                                <th>Jumlah Bunga</th>
                                <th>Total Tabungan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $id=$_GET['id'];
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_tabungan WHERE nomor='$id'";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td style="text-align: center;"><?php echo $no_a;?></td>
                                <td><?php echo $data_a['id_tabungan'];?></td>
                                <td><?php echo $data_a['tgl_tabung'];?></td>
                               
                                <td><?php 
                                  $jma= $data_a['jumlah_tabungan'];
                                  echo "Rp.".number_format($jma, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php echo $data_a['bunga_tabungan'];?></td>
                                <td><?php 
                                  $jb= $data_a['jumlah_bunga'];
                                  echo "Rp.".number_format($jb, 2, ".", ".");
                                  ?> 
                                </td>
                                <td><?php 
                                  $tt= $data_a['total_tabungan'];
                                  echo "Rp.".number_format($tt, 2, ".", ".");
                                  ?> 
                                </td>
                               
                              </tr>
                              <?php $no_a++;}?>
                            </tbody>
                          </table>
                        
                  
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>