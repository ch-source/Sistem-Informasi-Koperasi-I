<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Tabungan Baru Nasabah</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_tabungan_nasabah.php" enctype="multipart/form-data">
                    
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penerima</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="np" autofocus="autofocus" required="required">
                        <option value="" selected="selected">Pilih Nasabah</option>
                         <?php 
                           $query="SELECT * FROM tbl_nasabah";
                           $sql=mysqli_query($connect, $query);
                           while($data1=mysqli_fetch_array($sql)){
                           echo"<option value='".$data1['id_nasabah']."''>".$data1['id_nasabah']."-".$data1['nama_nasabah']."</option>";
                            }
                         ?>
                      </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Periode</label>
                        <div class="col-sm-8">
                            <select name="bulan" class="form-control" required="required">
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
                            <select name="tahun" class="form-control" required="required">
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
                        <input type="date" class="form-control" name="tgls" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penyetor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="npy" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jmlh Tabungan (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jt" id="jt" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="bunga" id="bunga" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jmlh Bunga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jb" id="jb" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Tabungan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="tt" id="tt" required="required">
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

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                    $("#jt, #bunga").keyup(function() {
                             var jt = $("#jt").val();
                             var bunga = $("#bunga").val();
                             
                             var str = $("#jt").val();
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

                             var tt= parseInt(jt) + parseInt(jb);
                             $("#tt").val(tt);
                          });
                        });
                    </script>
        <!---Container Fluid-->