 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Detail Pengajuan Pinjaman Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pengajuan Pinjaman Anggota</li>
            </ol>
          </div>
          
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-dark"></h6><a href="dashboard.php?p=data_pinjaman_anggota" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $id=$_GET['id'];
                       $query = "SELECT * FROM tbl_pinjaman_anggota WHERE id_pinjaman='$id'";
                       $hasil = mysqli_query($connect,$query);
                       $data=mysqli_fetch_array($hasil);

                       $query1 = "SELECT * FROM tbl_anggota WHERE id_anggota='".$data['id_anggota']."'";
                       $hasil1 = mysqli_query($connect,$query1);
                       $data1 = mysqli_fetch_array($hasil1);
                      ?>
                      <div class="row">
                       <div class="col-lg-4">ID Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['id_pinjaman'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">ID Anggota</div>
                        <div class="col-lg-8"> : <?php echo $data['id_anggota'];?> - <?php echo $data1['nama_anggota'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Tanggal Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['tgl_pinjaman'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Telepon</div>
                        <div class="col-lg-8"> : <?php echo $data['no_telepon'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Alamat</div>
                        <div class="col-lg-8"> : <?php echo $data['alamat'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Pekerjaan</div>
                        <div class="col-lg-8"> : <?php echo $data['pekerjaan'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Status Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['status_peminjam'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Jenis Jaminan</div>
                        <div class="col-lg-8"> : <?php echo $data['jenis_jaminan'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Jenis Bunga</div>
                        <div class="col-lg-8"> : <?php echo $data['jenis_bunga'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Bunga</div>
                        <div class="col-lg-8"> : <?php echo $data['bunga'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Jangka Waktu</div>
                        <div class="col-lg-8"> : <?php echo $data['jangka_waktu'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Jumlah Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['jumlah_pinjaman'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Status Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['status_pinjaman'];?></div>
                      </div>

                       
                      </tr>
                    </tbody> 
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
