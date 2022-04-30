 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
         
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark"> Detail Data Pengajuan Pinjaman Nasabah</h6><a href="dashboard.php?p=data_pinjaman_nasabah" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  
                      <?php
                       include "koneksi.php";
                       $id=$_GET['id'];
                       $query = "SELECT * FROM tbl_pinjaman_nasabah WHERE id_pinjaman='$id'";
                       $hasil = mysqli_query($connect,$query);
                       $data=mysqli_fetch_array($hasil);

                       $query1 = "SELECT * FROM tbl_nasabah WHERE id_nasabah='".$data['id_nasabah']."'";
                       $hasil1 = mysqli_query($connect,$query1);
                       $data1 = mysqli_fetch_array($hasil1);

                       $query_bunga=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE id_bunga_x='".$data['jenis_bunga']."'");
                          $data_bunga=mysqli_fetch_array($query_bunga);
                      ?>
                      <div class="row">
                       <div class="col-lg-4">ID Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['id_pinjaman'];?></div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">Peminjam</div>
                        <div class="col-lg-8"> : <?php echo $data['id_nasabah'];?> - <?php echo $data1['nama_nasabah'];?></div>
                      </div>
                    
                      <div class="row">
                       <div class="col-lg-4">Tanggal Pinjaman</div>
                        <div class="col-lg-8"> : <?php echo $data['tgl_pinjam'];?></div>
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
                        <div class="col-lg-8"> : <?php echo $data_bunga['ket_bunga'];?></div>
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

                        
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
