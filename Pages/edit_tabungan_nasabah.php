<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Simpanan Nasabah</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query_a="SELECT * FROM tbl_simpanan_nasabah WHERE id_simpanan_n='$id'";
                  $sql_a=mysqli_query($connect, $query_a);
                  $data_a=mysqli_fetch_array($sql_a);
                  ?>
                  <?php
                 if(isset($_GET['notif'])){
                 if($_GET['notif']=="gagal"){
                  echo "<div class='alert alert-danger alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=edit_simpanan_nasabah&id='".$id."' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-warning'></i> Oppss!, Data Simpanan Nasabah <b>Gagal Diubah.</b>
                        </div>";
                }
              }
              ?>
                   <form method="post" action="proses_edit_simpanan_nasabah.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penerima</label>
                      <div class="col-sm-10">
                        <input type="text"  name="np" class="form-control" value="<?php echo $data_a['id_nasabah'];?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penyetor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="npy" value="<?php echo $data_a['nama_penyetor'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No. Identitas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="ni" value="<?php echo $data_a['no_identitas'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select name="jklm" class="form-control" required="required">
                          <option value="" selected="selected">-Jenis Kelamin-</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="alm" value="<?php echo $data_a['almt'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Setor</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgls" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Simpanan</label>
                      <div class="col-sm-10">
                        <select name="jsmp" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Simpanan-</option>
                          <option value="Simpanan Wajib">Simpanan Wajib</option>
                          <option value="Tabungan ">Tabungan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jmlh Simpanan (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jm" value="<?php echo $data_a['jml_smpnn'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a href="dashboard.php?p=data_simpanan_nasabah" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-save"></i>Simpan Perubahan</a>
                        <a href="dashboard.php?p=data_simpanan_nasabah" class="btn btn-warning" style="margin-bottom: 3px; "><i class="fa fa-exit"></i>Tutup</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->