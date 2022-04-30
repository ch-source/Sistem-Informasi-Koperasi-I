<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Nasabah</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query_a="SELECT * FROM tbl_nasabah WHERE id_nasabah='$id'";
                  $sql_a=mysqli_query($connect, $query_a);
                  $data_a=mysqli_fetch_array($sql_a);?>
                   <form method="post" action="proses_edit_nasabah.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <textarea name="nama" class="form-control" required="required"><?php echo $data_a['nama_nasabah'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No. Identitas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_a['no_identitas'];?>" name="notas" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Lahir</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl" value="<?php echo $data_a['tgl_lahir'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select name="jk" class="form-control" required="required">
                          <option value="" selected="selected">-Jenis Kelamin-</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Masuk</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgp" value="<?php echo $data_a['tgl_pengajuan'];?>"required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo $data_a['alamat'];?>" class="form-control" name="alt" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No. Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="notel" value="<?php echo $data_a['no_tlpn'];?>" class="form-control"required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select name="status" class="form-control" required="required">
                          <option value="" selected="selected">-Status-</option>
                          <option value="Sudah Menikah">Sudah Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pekerjaan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="pekerjaan" value="<?php echo $data_a['pekerjaan'];?>"required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->