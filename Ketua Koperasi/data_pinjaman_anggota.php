 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Pengajuan Pinjaman Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengajuan Pinjaman Anggota</li>
            </ol>
          </div>
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengajuan Pinjaman Anggota</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Pinjaman</th>
                        <th>Nama Anggota</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Status Peminjam</th>
                        <th>Jenis Jaminan</th>
                        <th>Jenis Bunga</th>
                        <th>Bunga</th>
                        <th>Jangka Waktu</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Status Pinjaman</th>
                        <th>Status Pembayaran</th>
                        <th>Opsi</th>
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
                        <td><?php echo $data['bunga'];?></td>
                        <td><?php echo $data['jangka_waktu'];?></td>
                        <td><?php 
                          $jp= $data['jumlah_pinjaman'];
                          echo "Rp.".number_format($jp, 2, ".", ".");
                          ?> 
                        </td>
                        <td><?php echo $data['status_pinjaman'];?></td>
                         <td><?php echo $data['status'];?></td>
                    
                        <td><a href="dashboard_kk.php?p=detail_pinjaman_anggota&id=<?php echo $data['id_pinjaman'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
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
        
