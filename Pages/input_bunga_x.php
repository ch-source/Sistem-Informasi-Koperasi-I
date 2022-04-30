<!-- Container Fluid-->
        
         <?php
         if (isset($_POST['pilih'])) {
          $jenis=$_POST['jenis'];
           include "koneksi.php";
              $query = "SELECT max(id_bunga_x) as maxId FROM tbl_bunga_x";
              $hasil = mysqli_query($connect,$query);
              $data = mysqli_fetch_array($hasil);
              $idbunga = $data['maxId'];
              $noUrut = (int) substr($idbunga, 3, 3);
              $noUrut++;
              $char = "BUN";
              $idbunga= $char . sprintf("%03s", $noUrut);
         }else{
          header("location:dashboard.php?p=data_bunga");
         }
             
             ?>
        <div class="container-fluid" id="container-wrapper">

          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Data Bunga</h6> <a href="dashboard.php?p=data_bunga_x" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>
                </div>
                <div class="card-body">
                 Ketrangan :<br>
                  * BS = Bunga Simpanan<br>
                  * BP = Bunga Pinjaman
                  <br>
                  <br>
                  <?php if ($jenis=="BS"){
                      echo"
                      <form method='post' action='proses_simpan_bunga_x.php' role='form' method='post'>
                      <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>ID Bunga</label>
                        <div class='col-sm-10'>
                          <input type='text' readonly class='form-control' name='id' value='".$idbunga."'>
                          </div>
                        </div>
                         <div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Jenis Bunga</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' value='".$jenis."' name='jns'  readonly>
                          </div>
                        </div>
                         <div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Bunga (%)</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' name='bg' required='required'>
                          </div>
                        </div>
                        <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Simpan</button>
                      </div>

                        ";
                    }else if ($jenis="BP") {
                       echo"
                      <form method='post' action='proses_simpan_bunga_y.php' role='form' method='post'>
                      <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>ID Bunga</label>
                        <div class='col-sm-10'>
                          <input type='text' readonly class='form-control' name='id' value='".$idbunga."'>
                          </div>
                        </div>
                      <div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Jenis Bunga</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' value='".$jenis."' name='jns'  readonly>
                          </div>
                        </div>
                       <div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Bunga Menurun (%)</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' name='bm' required='required'>
                          </div>
                        </div>
                       <div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Bunga Tetap(%)</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' name='bt' required='required'>
                          </div>
                        </div>
                        <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Simpan</button>
                      </div>

                        ";
                    }?>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->