<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Bunga</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query="SELECT * FROM tbl_bunga WHERE id_bunga='$id'";
                  $sql=mysqli_query($connect, $query);
                  $data_user=mysqli_fetch_array($sql);?>
                  <form method="post" action="proses_edit_bunga.php?id=<?php echo $id;?>">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga Menurun (%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_user['bunga_m'];?>" name="bm" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga Tetap (%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_user['bunga_t'];?>" name="bt" required="required">
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