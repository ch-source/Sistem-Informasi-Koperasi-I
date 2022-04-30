<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Nasabah</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Nasabah</li>
            </ol>
          </div>
          <a href="dashboard.php?p=input_nasabah" class="btn btn-primary" style="margin-bottom: 3px;"><i class="fa fa-edit"></i> INPUT NASABAH</a>
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Nasabah</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Nasabah</th>
                        <th>Nama</th>
                        <th>No. Identitas</th>
                        <th>Tgl. Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl. Masuk</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Daftar Anggota</th>
                        <th>Status Tabungan Awal</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_nasabah WHERE status_anggota=''";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_nasabah'];?></td>
                        <td><?php echo $data['nama_nasabah'];?></td>
                        <td><?php echo $data['no_identitas'];?></td>
                        <td><?php echo $data['tgl_lahir'];?></td>
                        <td><?php echo $data['jk'];?></td>
                        <td><?php echo $data['tgl_pengajuan'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['no_tlpn'];?></td>
                        <td><?php echo $data['status'];?></td>
                        <td><?php echo $data['pekerjaan'];?></td>

                        <td><?php 
                        if ($data['status_anggota']=='') {
                           echo "<a href='dashboard.php?p=input_anggota_nasabah&id=".$data['id_nasabah']."' class='btn btn-warning btn-sm'><i class='fa fa-plus'></i> Tambah Sebagai Anggota</a>";
                         } else{
                          echo "Sudah Terdaftar Menjadi Anggota";
                         }
                         ?>
                          </td>
                        <td><?php 
                        if ($data['status_tbngan_awal']=="") {
                           echo "<a href='dashboard.php?p=input_tabungan_y&id=".$data['id_nasabah']."' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a>";
                         } else  {
                          echo "<p style='color:green;'>OKE</p>";
                         }
                         ?>
                        </td>
                        <td><a href="dashboard.php?p=edit_nasabah&id=<?php echo $data['id_nasabah'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
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
