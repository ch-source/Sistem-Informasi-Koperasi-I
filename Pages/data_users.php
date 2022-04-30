<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Users</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Users</li>
            </ol>
          </div>
          <div class="row mb-12">
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_user.php" role="form" method="post">
                    <?php
                      include "koneksi.php";
                      $query = "SELECT max(id_user) as maxId FROM tbl_user";
                      $hasil = mysqli_query($connect,$query);
                      $data = mysqli_fetch_array($hasil);
                      $iduser = $data['maxId'];
                      $noUrut = (int) substr($iduser, 3, 3);
                      $noUrut++;
                      $char = "USR";
                      $iduser= $char . sprintf("%03s", $noUrut);
                    ?>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama User</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Level</label>
                      <div class="col-sm-10">
                        <select name="level" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Level-</option>
                          <option value="Admin">Admin</option>
                          <option value="Ketua Koperasi">Ketua Koperasi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th style="text-align: center;">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_user="SELECT * FROM tbl_user";
                       $sql_user=mysqli_query($connect, $query_user);
                       while ($data_user=mysqli_fetch_array($sql_user)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_user['id_user'];?></td>
                         <td><?php echo $data_user['nama_user'];?></td>
                         <td><?php echo $data_user['level'];?></td>
                         <td><?php echo $data_user['username'];?></td>
                         <td><?php echo $data_user['password'];?></td>
                         <td style="text-align: center;"><a href="dashboard.php?p=edit_users&id=<?php echo $data_user['id_user'];?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
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
        <!---Container Fluid-->