<?php
include"koneksi.php";
$id=$_GET['id'];
$query="SELECT*FROM tbl_pinjaman_anggota WHERE id_pinjaman='$id'";
$sql=mysqli_query($connect, $query);
$data=mysqli_fetch_array($sql) ;
$query_anggota=mysqli_query($connect, "SELECT * FROM tbl_anggota WHERE id_anggota='".$data['id_anggota']."'");
$data_anggota=mysqli_fetch_array($query_anggota);

$query_bunga=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE id_bunga_x='".$data['jenis_bunga']."'");
$data_bunga=mysqli_fetch_array($query_bunga);

?>
 <!-- Container Fluid-->

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Input Data Pembayaran Pinjaman Anggota </h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Input Data Pembayaran Pinjaman Anggota</li>
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
                  <form method="post" action="proses_simpan_pembayaran_pinjaman.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                      <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Pinjaman</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="id" value="<?php echo $data['id_pinjaman'] ?>" readonly="readonly">
                      </div>
                   
                      <label class="col-sm-2 col-form-label" style="text-align: right;">Peminjam</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="np" value="<?php echo $data['id_anggota'] ?>" readonly="readonly">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data_anggota['nama_anggota'] ?>" readonly="readonly">
                      </div>
                    </div>
                   
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="tp"  id="tp" required="required">
                      </div>
                   
                      <label class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="jp" id="jp" value="<?php echo $data['jumlah_pinjaman'] ?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Bunga</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="jb" id="jb" value="<?php echo $data_bunga['ket_bunga'] ?>" readonly="readonly">
                      </div>
                      
                      <label class="col-sm-2 col-form-label">Bunga (%)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="bunga" id="bunga" value="<?php echo $data['bunga'] ?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jangka Waktu</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="jw" id="jw" value="<?php echo $data['jangka_waktu'] ?>" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Angsuran Ke-</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data['angsuran_k'] ?>" name="ak" id="ak" onclick="angsur()" required="required">
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
                        <input type="text" class="form-control"  name="tt" id="tt" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12"  style="text-align: right;">
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
                    $("#bunga, #jw, #jp, #ak, #tp").keyup(function() {
                             var ak = $("#ak").val();
                             var jp  = $("#jp").val();
                             var jw = $("#jw").val();
                             var bunga = $("#bunga").val();
                             

                             var ap= parseInt(jp) / parseInt(jw);
                             $("#ap").val(ap);

                             var ab= parseInt(jp) * parseFloat(bunga/100);
                             $("#ab").val(ab);

                            var sa = parseInt(jw) - 1;
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
  