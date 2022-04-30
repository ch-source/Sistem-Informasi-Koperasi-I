<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Users</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query="SELECT * FROM tbl_user WHERE id_user='$id'";
                  $sql=mysqli_query($connect, $query);
                  $data_user=mysqli_fetch_array($sql);?>
                  <form method="post" action="proses_edit_user.php?id=<?php echo $id;?>">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama User</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_user['nama_user'];?>" name="nama" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Level</label>
                      <div class="col-sm-10">
                        <select name="level" class="form-control" required="required">
                          <option value="" selected="selected">..Pilih Level..</option>
                          <option value="Admin">Admin</option>
                          <option value="Ketua Koperasi">Ketua Koperasi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_user['username'];?>" name="username" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_user['password'];?>" name="password" required="required">
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