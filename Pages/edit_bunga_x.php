<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Form Edit Data Bunga</h6><a href="dashboard.php?p=data_bunga_x" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>


                  
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $ket=$_GET['ket'];
                  $query="SELECT * FROM tbl_bunga_x WHERE ket_bunga='$ket' AND id_bunga_x='$id'";
                  $sql=mysqli_query($connect, $query);
                  $data_user=mysqli_fetch_array($sql);?>
                  <form method="post" action="proses_edit_bunga_x.php?id=<?php echo $id;?>&ket=<?php echo $data_user['ket_bunga'];?>">
                    <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Jenis Bunga</label>
                      <div class='col-sm-10'>
                        <input type='text' class='form-control' value='<?php echo $data_user['jenis_bunga'];?>' name='jns' readonly>
                      </div>
                    </div>
                    <?php if ($data_user['jenis_bunga']=="BS"){
                      echo"
                     <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>".$data_user['ket_bunga']."(%)</label>
                      <div class='col-sm-10'>
                        <input type='text' class='form-control' value='".$data_user['bunga_a']."' name='bm' required='required'>
                      </div>
                    </div>
                    
                        <input type='hidden' class='form-control' name='bt'>
                     
                      ";
                    }else{
                      echo"
                      <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>".$data_user['ket_bunga']."(%)</label>
                      <div class='col-sm-10'>
                        <input type='text' class='form-control' value='".$data_user['bunga_a']."' name='bm' required='required'>
                      </div>
                    </div>
                    
                      ";
                    }?>
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