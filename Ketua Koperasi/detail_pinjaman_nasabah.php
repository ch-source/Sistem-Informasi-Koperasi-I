 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Detail Pinjaman Nasabah</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pinjaman Nasabah</li>
            </ol>
          </div>
          
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> Detail Data Pinjaman Nasabah</h6>
                </div>
                <?php
                if(isset($_GET['notif'])){
                 if($_GET['notif']=="konfirmasi-gagal"){
                  echo "<div class='alert alert-danger alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard_kk.php?p=detail_pinjaman_nasabah&id=".$id."' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-warning'></i>Oppss!, Data Pengajuan Pinjaman<b>Gagal Dikonfirmasi.</b>
                        </div>";
                }
              }
              ?>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $id=$_GET['id'];
                       $query = "SELECT * FROM tbl_pinjaman_nasabah WHERE id_pinjaman='$id'";
                       $hasil = mysqli_query($connect,$query);
                       $data=mysqli_fetch_array($hasil);

                       $query1 = "SELECT * FROM tbl_nasabah WHERE id_nasabah='".$data['id_nasabah']."'";
                       $hasil1 = mysqli_query($connect,$query1);
                       $data1 = mysqli_fetch_array($hasil1);
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

                        <div class="box-footer">
                          <?php if ($data['status_pinjaman']==""){
                            echo "<a href='proses_konfirmasi_pengajuan_nasabah.php?id=".$data['id_pinjaman']."' class='btn btn-primary'><i class='fa fa-check'></i> Konfirmasi Pengajuan</a>
                              <a href='dashboard_kk.php?p=data_pinjaman_nasabah' class='btn btn-default'><i class='fa fa-warning'></i> Tutup</a>";
                           }else{
                           echo"<a href='dashboard_kk.php?p=data_pinjaman_nasabah' class='btn btn-default'><i class='fa fa-warning'></i> Tutup</a>";
                            }
                           ?>
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
