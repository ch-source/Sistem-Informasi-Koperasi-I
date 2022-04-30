<?php
if (!isset($_POST['nama'])) {
  
  echo "<script>alert('Pilih Nasabah/Anggota Terlebih Dahulu!!');
    document.location.href='dashboard.php?p=data_penarikkan'</script>\n";
}else{
include"koneksi.php";
$nama=$_POST['nama'];
$query_x = "SELECT max(id_tabungan) as idMax FROM tbl_tabungan WHERE nomor='".$_POST['nama']."'";
$hasil_x = mysqli_query($connect,$query_x);
$data_x = mysqli_fetch_array($hasil_x);
if ($data_x['idMax']=="") {
 echo "<script>alert('Opss!, Nasabah/Anggota Ini Belum Memiliki Tabungan');
    document.location.href='dashboard.php?p=data_penarikkan'</script>\n";
}else{
  $kode=$data_x['idMax'];
  $query="SELECT * FROM tbl_tabungan WHERE id_tabungan='".$data_x['idMax']."'";
  $sql=mysqli_query($connect, $query);
  $data=mysqli_fetch_array($sql); 

  $query_nasabah="SELECT * FROM tbl_anggota_nasabah WHERE nomor='".$_POST['nama']."'";
  $sql_nasabah=mysqli_query($connect, $query_nasabah);
  $data_nasabah=mysqli_fetch_array($sql_nasabah);
  $total=$data['total_tabungan'];
}
}
?>

        <div class="container-fluid" id="container-wrapper">
         
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Form Input Data Penarikan Tabungan <?php echo $data_nasabah['level'];?></h6> <a href="dashboard.php?p=data_penarikkan" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></a>
                </div>
                <div class="card-body">
                  <b>Informasi Tabungan <?php echo $data_nasabah['level'];?>:</b>
                  <div class="row">
                      <div class="col-sm-2"> ID <?php echo $data_nasabah['level'];?></div>
                      <div class="col-sm-2"> : <?php echo $data_nasabah['nomor'];?></div>
                    </div>
                  <div class="row">
                      <div class="col-sm-2"> Nama <?php echo $data_nasabah['level'];?></div>
                      <div class="col-sm-2"> : <?php echo $data_nasabah['nama'];?></div>
                  </div>
                  <div class="row">
                      <div class="col-sm-2"> Total Tabungan: </div>
                      <div class="col-sm-2"> : <?php echo "Rp.".number_format($data['total_tabungan'], 2, ".", "."); ?></div>
                  </div>
                  <hr>
                    <form method="post" name="autoSumForm" action="proses_simpan_penarikkan.php?total=<?php echo $total;?>&nama=<?php echo $nama;?>&kode=<?php echo $kode;?>" role="form" method="post">
                   <?php
                    include "koneksi.php";
                    $query = "SELECT max(id_penarikan) as maxId FROM tbl_penarikan";
                    $hasil = mysqli_query($connect,$query);
                    $data_p = mysqli_fetch_array($hasil);
                    $idpenarikan = $data_p['maxId'];
                    $noUrut = (int) substr($idpenarikan, 3, 3);
                    $noUrut++;
                    $char = "PNK";
                    $idpenarikan= $char . sprintf("%03s", $noUrut);
                    ?>
              
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Penarikkan </label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo $idpenarikan;?>"class="form-control" readonly="readonly" name="id" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Penarikan</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah Penarikan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="jp" name="jp"  required="required">
                      </div>
                    </div>
                    <b>Informasi Sisa Tabungan:</b>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Tabungan</label>
                      <div class="col-sm-4">
                        <input type="text" value="<?php echo $data['total_tabungan'];?>" readonly="readonly" class="form-control" id="total_tb" name="total_tb"  required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Sisa Tabungan</label>
                      <div class="col-sm-4">
                        <input type="text" readonly="readonly" class="form-control" id="sisa_tb" name="sisa_tb"  required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12" style="text-align: right;">
                        <button type="submit" id="btnsimpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      
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
                    $("#jp, #total_tb").keyup(function() {
                             var jp= $("#jp").val();
                             var total_tb = $("#total_tb").val();
                             if (parseInt(jp)>parseInt(total_tb)) {
                              document.autoSumForm.btnsimpan.disabled=true;
                               var sisa_tb=0;
                             $("#sisa_tb").val(sisa_tb);
                               alert('Opsss!!, Jumlah Penarikkan Melebihi Total Tabungan Yang Tersedia..');

                             }else{
                              document.autoSumForm.btnsimpan.disabled=false;
                             var sisa_tb= parseInt(total_tb) - parseInt(jp);
                             $("#sisa_tb").val(sisa_tb);
                              }

                          });
                        });
                    </script>
        <!---Container Fluid-->
        