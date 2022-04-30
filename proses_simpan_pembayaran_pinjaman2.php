<?php
include "koneksi.php";
$query = "SELECT max(id_pembayaran) as maxId FROM tbl_pembayaran_pinjaman";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idpembayaran = $data['maxId'];
$noUrut = (int) substr($idpembayaran, 3, 3);
$noUrut++;
$char = "PMB";
$idpembayaran= $char . sprintf("%03s", $noUrut);

$np = $_POST['np'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$tp = $_POST['tp'];
$ap = $_POST['ap'];
$ab = $_POST['ab'];
$jb = $_POST['jb'];
$bunga = $_POST['bunga'];
$jw = $_POST['jw'];
$ak = $_POST['ak'];
$sa = $_POST['sa'];
$jap = $_POST['jap'];
$jab = $_POST['jab'];
$ta = $_POST['ta'];
$tt = $_POST['tt'];

$cek = mysqli_query($connect, "SELECT * FROM tbl_pembayaran_pinjaman WHERE periode = '$bulan' AND tahun = '$tahun' AND id_pembayaran='$idpembayaran'");
        $result = mysqli_num_rows($cek);
        $data = mysqli_fetch_array($cek);
        if ($result > 0) {
            echo "<script>alert('Proses Simpan Data Pembayaran Berhasil');
    document.location.href='dashboard.php?p=data_pembayaran_pinjaman'</script>\n";
        }else if ($result ==0) {
             $query1 = "INSERT INTO `tbl_pembayaran_pinjaman` (`id_pembayaran`, `id_anggota`, `periode`, `tahun`, `tgl_pembayaran`, `jumlah_pinjaman`, `jml_angsuran_bunga`, `jenis_bunga`, `bunga`, `jangka_waktu`, `angsuran_k`, `sisa_angsuran`, `angsuran_pokok`, `angsuran_bunga`, `total_angsuran`, `total_tunggakan`) VALUES ('$idpembayaran', '$np', '$bulan', '$tahun', '$tp', '$ap', '$ab', '$jb', '$bunga', '$jw', '$ak', '$sa', '$jap', '$jab', '$ta', '$tt')";
      $sql1 = mysqli_query($connect, $query1); 
      if ($sql1) {
          echo "<script>alert('Proses Simpan Data Pembayaran Berhasil');
                document.location.href='dashboard.php?p=data_pembayaran_pinjaman'</script>\n";
              }else{
                echo "<script>alert('Opss!, Data Pembayaran Pinjaman Gagal Disimpan');
                  document.location.href='dashboard.php?p=input_pembayaran_pinjaman'</script>\n";
           }
     }
  

?>