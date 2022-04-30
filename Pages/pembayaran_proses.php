      <section class="content">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Pinjaman Anggota</h3>
          </div>
          <div class="box-body" style="overflow: auto;">
           <table class="table table-bordered" style="font-size: 12px;">
            <thead>
              <th>Anggota</th>
              <th>Tanggal</th>
              <th>P/T</th>
              <th>Tgl. Pinjam</th>
              <th>Jml. Pinjam</th>
              <th>Jenis Bunga</th>
              <th>Bunga</th>
              <th>Jangka Waktu</th>
              <th>Angsuran Ke</th>
              <th>Sisa Angsuran</th>
              <th>Angsuran Pokok</th>
              <th>Angsuran Bunga</th>
              <th>Total Angsuran</th>
              <th>Total Tunggakan</th>
            </thead>
            <tbody>
          <?php
          if (isset($_POST['id_anggota'])) {
                include"koneksi.php";
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_anggota'] as $value) {
              $cek_a = mysqli_query($connect, "SELECT * FROM tbl_pinjaman_anggota WHERE periode = '$periode' AND tahun= '$tahun' AND id_anggota = '$value'");
                $result_a = mysqli_num_rows($cek_a);
                $data_a = mysqli_fetch_array($cek_a);
               
                if ($result_a > 0) {
                  echo "<script>alert('Opss!, Salah Satu / Beberapa Anggota Yang Anda Pilih Sudah Terdaftar Di Tabel Pembayaran Pinjaman Untuk Periode Dan Tahun Yang Anda Pilih');
                  document.location.href='dashboard.php?p=pembayaran'</script>\n";
                }else{
                  $query="SELECT * FROM tbl_anggota WHERE id_anggota='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<tr>";
                    echo"<td>".$data['id_anggota']."/".$data['nama_anggota']."</td>";
                    echo"<td>".date('m/d/Y')."</td>";
                    echo"<td>".$periode."/".$tahun."</td>";
                      $query_pinjaman="SELECT * FROM tbl_pinjaman_anggota WHERE id_anggota='".$data['id_anggota']."'";
                      $sql_pinjam=mysqli_query($connect, $query_pinjaman);
                      $data_pinjaman_anggota=mysqli_fetch_array($sql_pinjam);
                    echo"<td>".$data_pinjaman_anggota['tgl_pinjaman']."</td>";
                    echo"<td>Rp. ".$data_pinjaman_anggota['jumlah_pinjaman']."</td>";
                    echo"<td>".$data_pinjaman_anggota['jenis_bunga']."</td>";
                    echo"<td>".$data_pinjaman_anggota['bunga']."</td>";
                    echo"<td>".$data_pinjaman_anggota['jangka_waktu']."</td>";
                      
                      if ($count=1) {
                        $angsur=1;
                        $sisa_angsur=$data_pinjaman_anggota['jangka_waktu']-$angsur;
                      }else{
                        $bonus_full_absen=$count*$data_gaji['upah_full_absen'];
                        $total_bonus=$bonus_lembur+$bonus_full_absen;
                      }
                      $totalgaji=$data_gaji['gapok']+ $total_bonus+$jlh_thr-$potongan;
                    echo"<td>".$count." Hari</td>";
                    echo"<td>Rp. ".$bonus_full_absen."</td>";
                    echo"<td>Rp. ".$total_bonus."</td>";
                    echo"<td>Rp. ".$jlh_thr."</td>";
                    echo"<td>Rp. ".$totalgaji."</td>";
                    echo"<tr>";
                      }
                }
              }
            }else{
              echo "<script>alert('Opss!, Anggota Belum Dipilih');
              document.location.href='dashboard.php?p=pembayaran'</script>\n";
            }
      ?>
    </tbody>
  </table>
            <hr>
            <hr>
            <form method='post' action='proses_simpan_gaji_1.php'>
              <div class="box-body" style="height:10px; overflow: auto;">
          <?php
          if (isset($_POST['id_karyawan'])) {
                include"koneksi.php";
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_karyawan'] as $value) {
                  $query="SELECT * FROM tbl_karyawan WHERE id_karyawan='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<div class='row'>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>ID Karyawan</label>";
                            echo"<input type='text' name='id[]' readonly='readonly' class='form-control' value='".$data['id_karyawan']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>Nama Karyawan</label>";
                            echo"<input name='nama[]' type='text' readonly='readonly' class='form-control' value='".$data['nama_karyawan']."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tgl</label>";
                            echo"<input type='text' name='tglgaji[]' readonly='readonly' value='".date('m/d/Y')."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Periode</label>";
                          echo"<input type='text' name='periode[]' readonly='readonly' value='".$periode."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tahun</label>";
                            echo"<input type='text' name='tahun[]' readonly='readonly' value='".$tahun."' type='text' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      $query_gaji="SELECT * FROM tbl_data_gaji WHERE id_karyawan='".$data['id_karyawan']."'";
                      $sql_gaji=mysqli_query($connect, $query_gaji);
                      $data_gaji=mysqli_fetch_array($sql_gaji);
                      echo"<div class='row'>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Gapok</label>";
                            echo"<input type='text' name='gapok[]' readonly='readonly' class='form-control' value='".$data_gaji['gapok']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Upah Lembur</label>";
                            echo"<input type='text' readonly='readonly' class='form-control' value='".$data_gaji['upah_lembur']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Upah Full Absen</label>";
                            echo"<input type='text' readonly='readonly' value='".$data_gaji['upah_full_absen']."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Potongan Terlambat</label>";
                          echo"<input type='text' readonly='readonly' value='".$data_gaji['potongan_keterlambatan']."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      $query_lembur="SELECT * FROM tbl_rekap_lembur WHERE periode_lembur='$periode' AND tahun_lembur='$tahun' AND id_karyawan='".$data['id_karyawan']."'";
                      $sql_lembur=mysqli_query($connect, $query_lembur);
                      $data_lembur=mysqli_fetch_array($sql_lembur);
                      $bonus_lembur=$data_lembur['jlh_lembur'] * $data_gaji['upah_lembur'];
                      echo"<div class='row'>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Jlh. Lembur</label>";
                            echo"<input type='text' readonly='readonly' class='form-control' value='".$data_lembur['jlh_lembur']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Bonus Lembur</label>";
                            echo"<input name='bonuslembur[]' type='text' readonly='readonly' class='form-control' value='".$bonus_lembur."'>";
                          echo"</div>";
                        echo"</div>";
                        $query_absen="SELECT * FROM tbl_rekap_absen WHERE periode='$periode' AND tahun='$tahun' AND id_karyawan='".$data['id_karyawan']."'";
                        $sql_absen=mysqli_query($connect, $query_absen);
                        $data_absen=mysqli_fetch_array($sql_absen);
                        $potongan=$data_absen['jlh_terlambat'] * $data_gaji['potongan_keterlambatan'];
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Jlh. Terlambat</label>";
                            echo"<input type='text' readonly='readonly' value='".$data_absen['jlh_terlambat']."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-3'>";
                          echo"<div class='form-group'>";
                          echo"<label>Total Potongan Terlambat</label>";
                          echo"<input type='text' name='totalpotongan[]' readonly='readonly' value='".$potongan."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                     $order="SELECT * FROM tbl_absensi WHERE periode='$periode' AND tahun='$tahun' AND id_karyawan='".$data['id_karyawan']."'";
                      $query_order=mysqli_query($connect, $order);
                      $data_order=array();
                      while(($row_order=mysqli_fetch_array($query_order)) !=null){
                      $data_order[]=$row_order;
                      }
                      $count=count($data_order);
                    
                      $query_karyawan="SELECT * FROM tbl_karyawan WHERE id_karyawan='".$data['id_karyawan']."'";
                      $sql_karyawan=mysqli_query($connect, $query_karyawan);
                      $data_karyawan=mysqli_fetch_array($sql_karyawan);
                      if (isset($_POST['ceck1'])) {
                       $jlh_thr=0;
                        $awal=date_create("".$data_karyawan['tgl_mulai_kerja']."");
                        $akhir=date_create();
                        $diff=date_diff($awal, $akhir);
                        if ($diff->y==0) {
                          $xxx=$diff->m/12*$data_gaji['gapok'];
                          $jlh_thr=round($xxx);
                        }else{
                          $jlh_thr=$diff->y*$data_gaji['gapok'];
                        }
                      }else{
                        $jlh_thr=0;
                      }
                     
                      if ($count<=25) {
                        $bonus_full_absen=0;
                        $total_bonus=$bonus_lembur['gapok'];
                      }else{
                        $bonus_full_absen=$count*$data_gaji['upah_full_absen'];
                        $total_bonus=$bonus_lembur+$bonus_full_absen;
                      }
                      $totalgaji=$data_gaji['gapok']+ $total_bonus+$jlh_thr-$potongan;
                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Bonus Full Absen</label>";
                            echo"<input type='text' name='bonusfullabsen[]' readonly='readonly' class='form-control' value='".$bonus_full_absen."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Total Bonus</label>";
                            echo"<input type='text' name='totalbonus[]' readonly='readonly' class='form-control' value='".$total_bonus."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>THR</label>";
                            echo"<input type='text' name='thr[]' readonly='readonly' value='".$jlh_thr."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Total Gaji</label>";
                          echo"<input type='text' name='totalgaji[]' readonly='readonly' value='".$totalgaji."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";


                      }
                }
              }
            }else{
              echo "<script>alert('Opss!, Karyawan Belum Dipilih');
              document.location.href='dashboard.php?p=gaji'</script>\n";
            }
          }
      ?>
       </div>
      <a href="dashboard.php?p=gaji" class="btn btn-danger"><i class="fa fa-close"></i> Tutup</a>
      <button type='submit' class='btn btn-success'><i class='fa fa-save'></i> Simpan Penggajian</i></button>
      </form>
          </div>
         
        </div>
      </section>
     