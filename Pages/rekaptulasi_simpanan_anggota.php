<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Rekaptulasi Simpanan Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Rekaptulasi Simpanan</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Rekaptulasi Simpanan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Anggota</th>
                        <th>Tahun</th>
                        <th>Total Simpanan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     include "koneksi.php";
                     $no=1;
                     $query_user="SELECT COALESCE(tahun, 'TOTAL') AS tahun, 
                                         COALESCE(id_anggota, 'SUB TOTAL') AS id_anggota,
                                         SUM(ttl_simpanan) AS ttl_simpanan 
                                  FROM `tbl_rekap_simpanan_a` 
                                  GROUP BY `tahun`, `id_anggota` WITH ROLLUP";
                     $sql_user=mysqli_query($connect, $query_user);
                     while ($data_user=mysqli_fetch_array($sql_user)) {
                    ?>
                     <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data_user['id_anggota'];?></td>
                      <td><?php echo $data_user['tahun'];?></td>
                      <td>
                       <?php 
                        $ttlsimpanan= $data_user['ttl_simpanan'];
                        echo "Rp. ".number_format($ttlsimpanan, 2, ".", ".");
                       ?>
                      </td>
                     </tr>
                     <?php $no++;}?>
                    </tbody> 
                  </table>
                </div>
                <div class="box-footer">
                 <a href="dashboard.php?p=data_simpanan_anggota" class="btn btn-warning"><i></i> Tutup</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
