<?php
include"koneksi.php";
$id=$_GET['id'];

$query_nasabah="SELECT * FROM tbl_anggota WHERE id_anggota='$id'";
$sql_nasabah=mysqli_query($connect, $query_nasabah);
$data_nasabah=mysqli_fetch_array($sql_nasabah); 

$query_bunga=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE jenis_bunga='BS'");
$data_bunga=mysqli_fetch_array($query_bunga);
?>
          <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Form Input Simpanan Wajib Anggota</h6><a href="dashboard.php?p=data_anggota" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <form method="post" name='autoSumForm' action="proses_simpanan_anggota_x.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                   
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID / Nama Anggota</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="penerima" value="<?php echo $id; ?>" readonly="readonly">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  value="<?php echo $data_nasabah['nama_anggota']; ?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Periode & Tahun</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="bulan"  value="<?php echo date("F"); ?>" readonly="readonly">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <div class="col-sm-8">
                            <select name="tahun" class="form-control" readonly="readonly">
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
                      <label class="col-sm-2 col-form-label">Tgl. Setor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tgl" value="<?php echo date('Y-m-d');?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jlh. Simpanan Wajib (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo('100000,00') ;?>"  name="sw" required="required">
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->