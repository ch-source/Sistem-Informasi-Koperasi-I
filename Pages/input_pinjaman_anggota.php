<?php
if (!isset($_POST['anggota'])) {
  
  echo "<script>alert('Pilih Anggota Terlebih Dahulu!!');
    document.location.href='dashboard.php?p=data_pinjaman_anggota'</script>\n";
}else{
include"koneksi.php";
$anggota=$_POST['anggota'];
$jenis=$_POST['jenis'];

$query_anggota="SELECT * FROM tbl_anggota WHERE id_anggota='".$_POST['anggota']."'";
$sql_anggota=mysqli_query($connect, $query_anggota);
$data_anggota=mysqli_fetch_array($sql_anggota);

$query="SELECT * FROM tbl_jaminan WHERE jenis_jaminan='".$_POST['jenis']."'";
$sql=mysqli_query($connect, $query);
$data=mysqli_fetch_array($sql); 

}
?>
<?php if ($_POST['jenis']=="BPKB Mobil"){?>
        <div class="container-fluid" id="container-wrapper">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Input Pengajuan Pinjaman Anggota </h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Input Pengajuan Pinjaman Anggota</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header" style="text-align: right;">
                <h6 class="m-0 font-weight-bold text-dark"></h6><a href="dashboard.php?p=data_pinjaman_anggota" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <form method="post" name='autoSumForm' action="proses_simpan_pinjaman_anggota_y.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Anggota</label>
                      <div class="col-sm-4">
                       <input type="text" class="form-control" name="nim"  value="<?php echo $_POST['anggota']; ?>" readonly="readonly">
                      </div>
                      <label class="col-sm-2 col-form-label">Nama Anggota</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  value="<?php echo $data_anggota['nama_anggota']; ?>" readonly="readonly">
                        </div>
                    </div>
                   <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="bulan"  value="<?php echo date("F"); ?>" readonly="readonly">
                        </div>
                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-4">
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

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Pinjaman</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo date('Y-m-d');?>"  name="tgl_pinjam" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Telepon</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data_anggota['no_tlpn'];?>" readonly="readonly"  name="no_tlpn" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $data_anggota['alamat'];?>"  name="alamat" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Pekerjaan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $data_anggota['pekerjaan'];?>" name="pekerjaan" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-4">
                        <select name="statusnikah" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Status-</option>
                          <option value="Sudah Menikah">Sudah Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Jenis Jaminan</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="readonly" value="<?php echo $_POST['jenis'];?>" name="jenisjaminan" required="required">
                    </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Bunga</label>
                      <div class="col-sm-4">
                        <select id="bg" name="bg" class="form-control" onchange="changeBG(this.value)">
                             <option value="" selected="selected">Pilih Jenis Bunga</option>
                             <?php 
                               $sql_x=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE jenis_bunga='BP'");
                               $jsArray_x = "var nameBG  = new Array();\n";
                               while($data_x=mysqli_fetch_array($sql_x)){
                              
                                echo '<option value="'.$data_x['id_bunga_x'].'">'.$data_x['id_bunga_x'].'-'.$data_x['ket_bunga'].'</option> ';
                                $jsArray_x .= "nameBG['" . $data_x['id_bunga_x'] . "'] = {bunga_a:'" . addslashes($data_x['bunga_a']) . "'};\n";
                              }
                               
                              ?>
                              
                          </select>
                      </div>
                   
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  readonly="readonly" onFocus="startCalc();" onBlur="stopCalc();" name="bunga_a" id="bunga_a" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jangka Waktu</label>
                      <div class="col-sm-4">
                        <select name="jw" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Jangka Waktu-</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                        </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Min & Max Pinjaman (Rp)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $data['min'];?>"  name="min" readonly="readonly">
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $data['max'];?>"  name="max" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jlh. Pinjaman (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="jp" id="jp" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12" style="text-align: right;">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }else{?>
        <div class="container-fluid" id="container-wrapper">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Input Pengajuan Pinjaman Anggota </h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Input Pengajuan Pinjaman Anggota</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header" style="text-align: right;">
                <h6 class="m-0 font-weight-bold text-dark"></h6><a href="dashboard.php?p=data_pinjaman_anggota" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <form method="post" name='autoSumForm' action="proses_simpan_pinjaman_anggota_x.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Anggota</label>
                      <div class="col-sm-4">
                       <input type="text" class="form-control" name="nim"  value="<?php echo $_POST['anggota']; ?>" readonly="readonly">
                      </div>
                      <label class="col-sm-2 col-form-label">Nama Anggota</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  value="<?php echo $data_anggota['nama_anggota']; ?>" readonly="readonly">
                        </div>
                    </div>
                   <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="bulan"  value="<?php echo date("F"); ?>" readonly="readonly">
                        </div>
                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-4">
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

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Pinjaman</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo date('Y-m-d');?>"  name="tgl_pinjam" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Telepon</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data_anggota['no_tlpn'];?>" readonly="readonly"  name="no_tlpn" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $data_anggota['alamat'];?>"  name="alamat" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Pekerjaan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $data_anggota['pekerjaan'];?>" name="pekerjaan" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-4">
                        <select name="statusnikah" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Status-</option>
                          <option value="Sudah Menikah">Sudah Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Jenis Jaminan</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="readonly" value="<?php echo $_POST['jenis'];?>" name="jenisjaminan" required="required">
                    </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Bunga</label>
                      <div class="col-sm-4">
                        <select id="bg" name="bg" class="form-control" onchange="changeBG(this.value)">
                             <option value="" selected="selected">Pilih Jenis Bunga</option>
                             <?php 
                               $sql_x=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE jenis_bunga='BP'");
                               $jsArray_x = "var nameBG  = new Array();\n";
                               while($data_x=mysqli_fetch_array($sql_x)){
                              
                                echo '<option value="'.$data_x['id_bunga_x'].'">'.$data_x['id_bunga_x'].'-'.$data_x['ket_bunga'].'</option> ';
                                $jsArray_x .= "nameBG['" . $data_x['id_bunga_x'] . "'] = {bunga_a:'" . addslashes($data_x['bunga_a']) . "'};\n";
                              }
                               
                              ?>
                              
                          </select>
                      </div>
                   
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  readonly="readonly" onFocus="startCalc();" onBlur="stopCalc();" name="bunga_a" id="bunga_a" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jangka Waktu</label>
                      <div class="col-sm-4">
                        <select name="jw" class="form-control" required="required">
                          <option value="" selected="selected">-Pilih Jangka Waktu-</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                        </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Min & Max Pinjaman (Rp)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $data['min'];?>"  name="min" readonly="readonly">
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $data['max'];?>"  name="max" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jlh. Pinjaman (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="jp" id="jp" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12" style="text-align: right;">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
        <script type="text/javascript" src="./query_java.js"></script>
        <script type="text/javascript">    
        <?php echo $jsArray_x; ?>  
        function changeBG(y){  
        document.getElementById('bunga_a').value = nameBG[y].bunga_a;
         
        };  
        </script> 
                  <script type="text/javascript">
                    $(document).ready(function() {
                    $("#bunga").keyup(function() {
                             var bunga= parseFloat(bunga);
                          });
                        });
                    </script>