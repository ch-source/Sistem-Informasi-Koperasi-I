<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Laba Rugi</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Laba Rugi</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Laba Rugi</b>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/laporan_laba_rugi.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                      <div class="col-sm-3">
                        <input type="date" name="ta" class="form-control" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                      <div class="col-sm-3">
                         <input type="date" name="tak" class="form-control" required="required">
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Laba Rugi</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover">
                    <thead class="thead-light">
                    <tbody>
                      <tr><td colspan="3"><b>Pendapatan</b></td></tr>
                      <tr>
                    <?php
                    include"koneksi.php";
                     $result="SELECT SUM(angsuran_bunga) AS angsuran_bunga FROM  tbl_pembayaran_pinjaman";
                     $sd=mysqli_query($connect, $result);
                     $hasil=mysqli_fetch_object($sd);
                     
                      echo"<td>1. Pendapatan Bunga Pinjaman Anggota</td>
                      <td>Rp.".number_format($hasil->angsuran_bunga, 2, ".", ".")."</td>
                      <td></td>";
                      ?>
                    </tr>
                    <tr>
                      <?php
                      include"koneksi.php";
                     $result_a="SELECT SUM(angsuran_bunga) AS angsuran_bunga FROM  tbl_pembayaran_pinjaman_nasabah";
                     $sd_a=mysqli_query($connect, $result_a);
                     $hasil_a=mysqli_fetch_object($sd_a);
                     
                      echo"<td>2. Pendapatan Bunga Pinjaman Nasabah</td>
                      <td>Rp.".number_format($hasil_a->angsuran_bunga, 2, ".", ".")."</td>
                      <td></td>";
                      ?>
                    </tr>
                    <tr> 
                      <?php
                      $xap=$hasil_a->angsuran_bunga+$hasil->angsuran_bunga;
                      ?>
                        <td><b>Total Pendapatan</b></td><td></td><td><b><?php echo"Rp.".number_format($xap, 2, ".", ".")?></b></td>
                      </tr>
                      <tr><td colspan="3"><b>Beban</b></td></tr>
                      <tr>
                         <?php
                    include"koneksi.php";
                     $result_c="SELECT SUM(jml_bunga) AS jml_bunga FROM  tbl_tabungan_anggota";
                     $sd_c=mysqli_query($connect, $result_c);
                     $hasil_c=mysqli_fetch_object($sd_c);
                     
                      echo"<td>1. Beban Bunga Tabungan Anggota</td>
                      <td>Rp.".number_format($hasil_c->jml_bunga, 2, ".", ".")."</td>
                      <td></td>";
                      ?>
                    </tr>
                    <tr>
                      <?php
                      include"koneksi.php";
                     $result_b="SELECT SUM(jml_bunga) AS jml_bunga  FROM  tbl_tabungan_nasabah";
                     $sd_b=mysqli_query($connect, $result_b);
                     $hasil_b=mysqli_fetch_object($sd_b);
                     
                      echo"<td>2. Beban Bunga Tabungan Nasabah</td>
                      <td>Rp.".number_format($hasil_b->jml_bunga, 2, ".", ".")."</td>
                      <td></td>";
                      ?>
                    </tr>
                    <tr> 
                      <?php
                      $xap_a=$hasil_c->jml_bunga+$hasil_b->jml_bunga;
                      ?>
                        <td><b>Total Beban</b></td><td></td><td><b><?php echo"Rp.".number_format($xap_a, 2, ".", ".")?></b></td>
                      </tr>
                       <tr> 
                      <?php
                      $y=$xap-$xap_a;
                      ?>
                        <td><b>Laba Rugi</b></td><td></td><td><b><?php echo"Rp.".number_format($y, 2, ".", ".")?></b></td>
                      </tr>
                    </tbody> 
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->