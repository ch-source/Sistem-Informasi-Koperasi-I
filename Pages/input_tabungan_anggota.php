<!-- Container Fluid-->
        <?php 
          include"koneksi.php";
          $query_bunga=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE jenis_bunga='BS'");
          $data_bunga=mysqli_fetch_array($query_bunga);
        ?>
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Tabungan Baru Anggota</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_tabungan_anggota.php" enctype="multipart/form-data">
                   
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penerima</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="penerima" autofocus="autofocus" required="required">
                        <option value="" selected="selected">--Pilih Anggota--</option>
                         <?php 
                           $query="SELECT * FROM tbl_anggota WHERE status='Aktif'";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['id_anggota']."''>".$data1['id_anggota']."-".$data1['nama_anggota']."</option>";
                            }
                         ?>
                      </select>
                      </div>
                    </div>
                
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Setor</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jlh. Tabungan (Rp)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control"  name="jta" id="jta" required="required">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $data_bunga['bunga_a'];?>"  name="bunga" id="bunga" required="required">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Jlh. Bunga</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control"  name="jb" id="jb" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Tabungan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="tt" id="tt" required="required" style="font-weight: bold;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
         <script type="text/javascript" src="./query_java.js"></script>
         <script type="text/javascript">
          $(document).ready(function() {
                    $("#jta, #bunga").keyup(function() {
                             var jta = $("#jta").val();
                             var bunga = $("#bunga").val();


                              var str = $("#jta").val();
                              var z = str.substring(0,1);
                              var a = str.substring(1,2);
                              var b = str.substring(2,3);
                              var c = str.substring(3,4);
                              var d = str.substring(4,5);
                              var d = str.substring(5,6);
                                
                              if ((a)!=0){
                                var x = 0;
                                (b)=0;
                                (c)=0;
                                (d)=0;
                                (e)=0;
                                var q=(z+x+b+c+d+e);
                              }else{
                                var q=(str);
                              }
                             var jb= parseInt(q) * parseFloat(bunga)/100;
                             $("#jb").val(jb);

                             var tt= parseInt(str)+parseInt(jb);
                             $("#tt").val(tt);
                          });
                        });
                    </script>

        <!---Container Fluid-->