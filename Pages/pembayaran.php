 <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Input Pembayaran Pinjaman Anggota</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Input Pembayaran Pinjaman Anggota</li>
            </ol>
          </div>
          <a href="javascript:pilihsemua()" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i> Check All</a>&nbsp;&nbsp;
            <a href="javascript:bersihkan()"class="btn btn-danger btn-xs"><i class="fa  fa-ban"></i> Uncheck All</a>
          <div class="row mb-12">

            <!-- Earnings (Monthly) Card Example -->
                <div class="card-body">
                <form method="post" action="dashboard.php?p=pembayaran_proses">
            <table id="example2" class="table align-items-center table-bordered">
                <thead>
                <tr>
                  <th style="text-align: center;">Pilih</th>
                  <th>ID Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Pekerjaan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  include "koneksi.php";
                  $no=1;
                  $query_user="SELECT * FROM tbl_anggota";
                  $sql_user=mysqli_query($connect, $query_user);
                  while ($data_user=mysqli_fetch_array($sql_user)) {
                  ?>
                <tr>
                  <td style="text-align: center;" width="10px;">
                  <label>
                    <input type="checkbox" name="id_anggota[]" value="<?php echo $data_user['id_anggota'];?>">
                  </label>
                </td>
                  <td><?php echo $data_user['id_anggota'];?></td>
                  <td><?php echo $data_user['nama_anggota'];?></td>
                  <td><?php echo $data_user['pekerjaan'];?></td>
                </tr>
                <?php $no++;}?>
              </tbody>
            </table>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Angsuran Ke-</label>
                    
                      <select name="angsur" class="form-control" required="required">
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
                      </select>
                    
                  </div>
              </div>
              <div class="col-sm-4">
                 <div class="form-group">
                  <label>Periode</label>
                   <select name="periode" class="form-control" required="required">
                    <?php
                    $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    for($a=1;$a<=12;$a++){
                     if($a==date("m"))
                     { 
                     $pilih="selected";
                     }
                     else 
                     {
                     $pilih="";
                     }
                    echo("<option value=\"$a\" $pilih>$bulan[$a]</option>"."\n");
                    }
                    ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Tahun</label>
                    
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
            <a href="dashboard.php?p=data_pembayaran_pinjaman" class="btn btn-danger"><i class="fa fa-close"></i> Tutup</a>
            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Input Pembayaran</button>
                 </form>     
                </div>
                </div>
              </div>
        <script>
        function pilihsemua()
        {
            var daftarku = document.getElementsByName("id_anggota[]");
            var jml=daftarku.length;
            var b=0;
            for (b=0;b<jml;b++)
            {
                daftarku[b].checked=true;
                
            }
        }
        function bersihkan()
        {
            var daftarku = document.getElementsByName("id_anggota[]");
            var jml=daftarku.length;
            var b=0;
            for (b=0;b<jml;b++)
            {
                daftarku[b].checked=false;  
            }
        }
      </script>
