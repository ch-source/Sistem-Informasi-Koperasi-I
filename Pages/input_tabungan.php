<?php
if (!isset($_POST['nasabah'])) {
  
  echo "<script>alert('Pilih Nasabah Terlebih Dahulu!!');
    document.location.href='dashboard.php?p=data_tabungan'</script>\n";
}else{
include"koneksi.php";
$nasabah=$_POST['nasabah'];


$query_x = "SELECT max(id_tabungan) as maxId FROM tbl_tabungan WHERE nomor='".$_POST['nasabah']."'";
$hasil_x = mysqli_query($connect,$query_x);
$data_x = mysqli_fetch_array($hasil_x);

$query="SELECT * FROM tbl_tabungan WHERE id_tabungan='".$data_x['maxId']."'";
$sql=mysqli_query($connect, $query);
$data=mysqli_fetch_array($sql); 



$query_nasabah="SELECT * FROM tbl_anggota_nasabah WHERE nomor='".$_POST['nasabah']."'";
$sql_nasabah=mysqli_query($connect, $query_nasabah);
$data_nasabah=mysqli_fetch_array($sql_nasabah); 

$query_bunga=mysqli_query($connect, "SELECT * FROM tbl_bunga_x WHERE jenis_bunga='BS'");
$data_bunga=mysqli_fetch_array($query_bunga);
if ($data['jumlah_bunga']=="") {
 $ba=0;
}else{
  $ba=$data['jumlah_bunga'];
}

}
?>

        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Form Input Tabungan Nasabah</h6><a href="dashboard.php?p=data_tabungan" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_tabungan_anggota.php?id=<?php echo $nasabah; ?>" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID / Nama Nasabah</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="penerima" value="<?php echo $_POST['nasabah']; ?>" readonly="readonly">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  value="<?php echo $data_nasabah['nama']; ?>" readonly="readonly">
                      </div>
                    </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Setor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tgl" value="<?php echo date('Y-m-d');?>" readonly="readonly">
                      </div> 
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Saldo Awal (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="sa" id="sa" value="<?php echo $data['total_tabungan']-$data['jumlah_bunga'];?>" readonly="readonly"  required="required">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Bunga Awal (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly"  name="ba" id="ba" value="<?php echo $ba;?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jlh. Tabungan Baru (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo('100000,00') ;?>" name="tsa" id="tsa" required="required">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Bunga Baru (%)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data_bunga['bunga_a'];?>" name="bunga" id="bunga" required="required">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah Bunga (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly"  name="jb" id="jb" required="required">
                      </div>
                   
                      <label class="col-sm-2 col-form-label">Total Bunga (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly"  name="tb" id="tb" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Saldo Awal (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly"  name="jta" id="jta" required="required">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Total Tabungan (Rp)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly="readonly"  name="tt" id="tt" required="required">
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
        <script type="text/javascript" src="./query_java.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                    $("#tsa, #bunga, #sa").keyup(function() {
                             var tsa = $("#tsa").val();
                             var bunga = $("#bunga").val();
                             var sa = $("#sa").val();
                             var ba = $("#ba").val();
                             
                             

                             var jta= parseInt(sa) + parseInt(tsa);
                             $("#jta").val(jta);

                             var str = $("#tsa").val();
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