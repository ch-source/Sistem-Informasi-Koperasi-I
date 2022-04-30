<?php
include"koneksi.php";
$id=$_GET['id'];
$query="SELECT*FROM tbl_pinjaman_nasabah WHERE id_pinjaman='$id'";
$sql=mysqli_query($connect, $query);
$data=mysqli_fetch_array($sql) ;

$query_a="SELECT*FROM tbl_nasabah WHERE id_nasabah='".$data['id_nasabah']."'";
$sql_a=mysqli_query($connect, $query_a);
$data_a=mysqli_fetch_array($sql_a) ;

$query_b="SELECT*FROM tbl_bunga_x WHERE id_bunga_x='".$data['jenis_bunga']."'";
$sql_b=mysqli_query($connect, $query_b);
$data_b=mysqli_fetch_array($sql_b) ;
?>
 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Input Data Pembayaran Pinjaman Nasabah</h6><a href="dashboard.php?p=data_pinjaman_nasabah" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_pembayaran_pinjaman_nasabah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Pinjaman</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="id" value="<?php echo $data['id_pinjaman'] ?>" readonly="readonly">
                      </div>
                      <label class="col-sm-2 col-form-label" style="text-align: right;">Peminjam</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="np" value="<?php echo $data['id_nasabah'] ?>" readonly="readonly">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data_a['nama_nasabah'] ?>" readonly="readonly">
                      </div>
                    </div>
                   
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="tp" required="required">
                      </div>
                   
                      <label class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="jp" id="jp" value="<?php echo $data['jumlah_pinjaman'] ?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Bunga</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="jb" id="jb" value="<?php echo $data_b['ket_bunga'] ?>" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="bunga" id="bunga" value="<?php echo $data['bunga'] ?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jangka Waktu</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="jw" id="jw" value="<?php echo $data['jangka_waktu'] ?>" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Angsuran Ke-</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  value="<?php echo $data['angsuran_k'] ?>" name="ak" id="ak"  onclick="angsur()" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"> Sisa Angsuran</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="sa" id="sa" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Angsuran Pokok (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ap" id="ap" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Angsuran Bunga (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ab" id="ab" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Total Angsuran (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ta" id="ta" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jml. Sisa Angsuran (Rp)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tt" id="tt" readonly="readonly">
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
         <script type="text/javascript" src="./query.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function() {
                    $("#ak, #bunga, #jw, #jp").keyup(function() {
                             var ak  = $("#ak").val();
                             var jp  = $("#jp").val();
                             var jw = $("#jw").val();
                             var bunga = $("#bunga").val();
                             

                             var ap= parseInt(jp) / parseInt(jw);
                             $("#ap").val(ap);

                             var ab= parseInt(jp) * parseFloat(bunga/100);
                             $("#ab").val(ab);

                            var sa = parseInt(jw) - parseInt(ak);
                            $("#sa").val(sa);
        
                            var ta = parseInt(ab) + parseInt(ap);
                            $("#ta").val(ta);

                            var tt = parseInt(jp) - parseInt(ap);
                            $("#tt").val(tt);
                          });
                        });
                    function angsur() {
        var ak = document.getElementById("ak").value;
        if(ak==""){
            alert('Silahkan Input Data Angsuran Dengan Benar !!');
        }
 
    }
                    
                    </script>
        <!---Container Fluid-->
  