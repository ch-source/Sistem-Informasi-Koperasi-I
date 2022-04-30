<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Simpanan Anggota</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query_a="SELECT * FROM tbl_simpanan_a WHERE id_simpanan='$id'";
                  $sql_a=mysqli_query($connect, $query_a);
                  $data_a=mysqli_fetch_array($sql_a);
                  ?>
                  <?php
                 if(isset($_GET['notif'])){
                 if($_GET['notif']=="gagal"){
                  echo "<div class='alert alert-danger alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=edit_simpanan_anggota&id='".$id."' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-warning'></i> Oppss!, Data Simpanan Anggota <b>Gagal Diubah.</b>
                        </div>";
                }
              }
              ?>
                   <form method="post" action="proses_edit_simpanan_anggota.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penerima</label>
                      <div class="col-sm-10">
                        <input type="text"  name="penerima" class="form-control" value="<?php echo $data_a['id_anggota'];?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Periode</label>
                        <div class="col-sm-8">
                            <select name="bulan" class="form-control" value="<?php echo $data_a['periode'];?>"required="required">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">
                            <select name="tahun" class="form-control" value="<?php echo $data_a['tahun'];?>"required="required">
                                <?php
                                $mulai= date('Y') - 50;
                                for($i = $mulai; $i<$mulai + 100;$i++){
                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penyetor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="penyetor" value="<?php echo $data_a['nama_penyetor'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No. Identitas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="notas" value="<?php echo $data_a['no_identitas'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select name="jkl" class="form-control" required="required">
                          <option value="" selected="selected">-Jenis Kelamin-</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="alt" value="<?php echo $data_a['alamat'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Setor</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jmlh Simpanan (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jms" value="<?php echo $data_a['jml_simpanan'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a href="dashboard.php?p=data_simpanan_anggota" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-save"></i>Simpan Perubahan</a>
                        <a href="dashboard.php?p=data_simpanan_anggota" class="btn btn-warning" style="margin-bottom: 3px; "><i class="fa fa-exit"></i>Tutup</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
