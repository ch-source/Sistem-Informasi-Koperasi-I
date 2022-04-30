 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Data Pembayaran Pinjaman</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_pembayaran_pinjaman2.php" enctype="multipart/form-data">
                  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function() {
                    $("#bunga, #jw, #ap, #ab, #ak").keyup(function() {
                             var ap  = $("#ap").val();
                             var ab  = $("#ab").val();
                             var jw = $("#jw").val();
                             var bunga = $("#bunga").val();
                             var ak = $("#ak").val();

                             var jap= parseInt(ap) / parseInt(jw);
                             $("#jap").val(jap);

                             var jab= parseInt(ab*(bunga/100));
                             $("#jab").val(jab);

                            var sa = parseInt(jw) - parseInt(ak);
                            $("#sa").val(sa);
        
                            var ta = parseInt(jab) + parseInt(jap);
                            $("#ta").val(ta);

                            var tt = parseInt(ab) - parseInt(jap);
                            $("#tt").val(tt);
                          });
                        });
                    </script>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Peminjam</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="np" autofocus="autofocus" required="required">
                        <option value="" selected="selected">Pilih Peminjam</option>
                         <?php 
                           $query="SELECT * FROM tbl_anggota WHERE status='Aktif'";
                           $sql=mysqli_query($connect, $query);
                           while($data=mysqli_fetch_array($sql)){
                           echo"<option value='".$data['id_anggota']."''>".$data['id_anggota']."-".$data['nama_anggota']."</option>";
                            }
                         ?>
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
                      <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tp" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Angsuran Pokok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ap" id="ap" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Angsuran Bunga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ab" id="ab" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Bunga</label>
                      <div class="col-sm-10">
                        <select name="jb" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Jenis Bunga-</option>
                          <option value="Bunga Menurun">Bunga Menurun</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="bunga" id="bunga" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jangka Waktu</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="jw" id="jw" required="required">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Angsuran Ke-</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ak" id="ak" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"> Sisa Angsuran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="sa" id="sa" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jml Angsuran Pokok (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jap" id="jap" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jml Angsuran Bunga (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="jab" id="jab" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Angsuran (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="ta" id="ta" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Sisa Tunggakan (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="tt" id="tt" readonly="readonly">
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
        <!---Container Fluid-->
  