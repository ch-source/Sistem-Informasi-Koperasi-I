<?php
include"koneksi.php";
$id=$_GET['id'];
$query="SELECT * FROM tbl_tabungan_anggota WHERE id_tabungan_a='$id'";
$sql=mysqli_query($connect, $query);
$data=mysqli_fetch_array($sql) 
?>
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Tabungan Anggota</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_tabungan_anggota2.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Anggota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="penerima" value="<?php echo $data['id_anggota'] ?>" readonly="readonly">
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
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Penyetor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="penyetor" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Saldo Awal (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="sa" id="sa" value="<?php echo $data['total_tabungan']-$data['jml_bunga']?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga Awal (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="ba" id="ba" value="<?php echo $data['jml_bunga'] ?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jmlh. Tabungan Baru (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="tsa" id="tsa" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga Baru(%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="bunga" id="bunga" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah Bunga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jb" id="jb" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Bunga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="tb" id="tb" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Saldo Awal(Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jta" id="jta" required="required">
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
                    $("#jta, #bunga, #sa").keyup(function() {
                             var tsa = $("#tsa").val();
                             var bunga = $("#bunga").val();
                             var sa = $("#sa").val();
                             var ba = $("#ba").val();
                             
                             

                             var jta= parseInt(sa) + parseInt(tsa);
                             $("#jta").val(jta);

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

                              var tb= parseInt(ba) + parseInt(jb);
                             $("#tb").val(tb);

                             var tt= parseInt(jta) + parseInt(jb) + parseInt(ba);
                             $("#tt").val(tt);
                          });
                        });
                    </script>
        <!---Container Fluid-->