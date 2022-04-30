 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Simpanan Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Simpanan Anggota</li>
            </ol>
          </div>
          <a href="dashboard.php?p=input_simpanan_anggota" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-edit"></i> INPUT SHU</a>
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Simpanan Anggota</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Simpanan</th>
                        <th>Nama Penerima</th>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Nama Penyetor</th>
                        <th>No. Identitas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tanggal Setor</th>
                        <th>Jumlah Simpanan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_simpanan_a";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_simpanan'];?></td>
                        <td><?php echo $data['id_anggota'];?></td>
                        <td><?php echo $data['periode'];?></td>
                        <td><?php echo $data['tahun'];?></td>
                        <td><?php echo $data['nama_penyetor'];?></td>
                        <td><?php echo $data['no_identitas'];?></td>
                        <td><?php echo $data['jk'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['tgl_setor'];?></td>
                        <td><?php 
                          $jms= $data['jml_simpanan'];
                          echo "Rp.".number_format($jms, 2, ".", ".");
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
