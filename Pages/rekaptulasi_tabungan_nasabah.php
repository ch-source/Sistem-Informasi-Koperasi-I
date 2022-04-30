<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Rekaptulasi Tabungan Nasabah</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Rekaptulasi Tabungan</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Rekaptulasi Tabungan Nasabah</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Nasabah</th>
                        <th>Tahun</th>
                        <th>Jml. Bunga</th>
                        <th>Total Tabungan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     include "koneksi.php";
                     $no=1;
                     $query_user="SELECT* FROM `tbl_rekap_tabungan_nasabah`";
                     $sql_user=mysqli_query($connect, $query_user);
                     while ($data_user=mysqli_fetch_array($sql_user)) {

                    ?>
                     <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data_user['id_nasabah'];?></td>
                      <td><?php echo $data_user['tahun'];?></td>
                      <td><?php 
                          $jb= $data_user['jml_bunga'];
                          echo "Rp.".number_format($jb, 2, ".", ".");
                          ?> 
                        </td>
                      <td>
                       <?php 
                        $stn= $data_user['ttl_tabungan_nasabah'];
                        echo "Rp. ".number_format($stn, 2, ".", ".");
                       ?>
                      </td>
                     </tr>
                     <?php $no++;}?>
                    </tbody> 
                  </table>
                </div>
                <div class="box-footer">
                 <a href="dashboard.php?p=data_tabungan_nasabah" class="btn btn-warning"><i></i> Tutup</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
