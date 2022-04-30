<?php
include "koneksi.php";
$query = "SELECT max(id_pembayaran) as maxId FROM tbl_pembayaran_pinjaman_nasabah";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idpembayaran = $data['maxId'];
$noUrut = (int) substr($idpembayaran, 3, 3);
$noUrut++;
$char = "PMB";
$idpembayaran= $char . sprintf("%03s", $noUrut);

$id=$_GET['id'];
$np = $_POST['np'];
$tp = $_POST['tp'];
$jp = $_POST['jp'];
$jb = $_POST['jb'];
$bunga = $_POST['bunga'];
$jw = $_POST['jw'];
$ak = $_POST['ak'];
$sa = $_POST['sa'];
$ap = $_POST['ap'];
$ab = $_POST['ab'];
$ta = $_POST['ta'];
$tt = $_POST['tt'];

$query_pinjaman="SELECT * FROM tbl_pinjaman_nasabah WHERE id_pinjaman='$id'";
$sql_pinjaman=mysqli_query($connect, $query_pinjaman);
$data_pinjaman=mysqli_fetch_array($sql_pinjaman);
$angsuran=$data_pinjaman['angsuran_k']+1;
$jumlahpinjaman=$data_pinjaman['jumlah_pinjaman']-$ap;
$jangkawaktu=$data_pinjaman['jangka_waktu']- 1;
$status=$data_pinjaman['status'];
$status=$jumlahpinjaman;
if ($jumlahpinjaman==0) {
   $status='Lunas';

}else
{
  $status='';
}
if ($jp > $data_pinjaman['jumlah_pinjaman']){
    echo "<script>alert('Oops! Jumlah Uang Yang Anda Masukan Melebihi Sisa Pinjaman ...');
    document.location.href='dashboard.php?p=data_pinjaman_nasabah&id=".$id."'</script>\n";
}else{
      $query1 = "INSERT INTO `tbl_pembayaran_pinjaman_nasabah` (`id_pembayaran`, `id_pinjaman`, `id_nasabah`, `periode`, `tahun`, `tgl_pembayaran`, `jumlah_pinjaman`, `jenis_bunga`, `bunga`, `jangka_waktu`, `angsuran_k`, `sisa_angsuran`, `angsuran_pokok`, `angsuran_bunga`, `total_angsuran`, `total_tunggakan`) VALUES ('$idpembayaran', '$id', '$np', '', '', '$tp', '$jp', '$jb', '$bunga', '$jw', '$ak', '$sa', '$ap', '$ab', '$ta', '$tt')";
      $sql1 = mysqli_query($connect, $query1); 
      if ($sql1) {
        $query_r="UPDATE tbl_pinjaman_nasabah SET jumlah_pinjaman='$jumlahpinjaman' WHERE id_pinjaman='$id'";
               $sql_r=mysqli_query($connect, $query_r);
               if ($query_r) {
                $query_a="UPDATE tbl_pinjaman_nasabah SET jangka_waktu='$jangkawaktu' WHERE id_pinjaman='$id'";
               $sql_a=mysqli_query($connect, $query_a);
               if ($query_a) {
                $queryb="UPDATE tbl_pinjaman_nasabah SET status='$status' WHERE id_pinjaman='$id'";
                $sqlb=mysqli_query($connect, $queryb);
                if ($queryb) {
                  $queryc="UPDATE tbl_pinjaman_nasabah SET angsuran_k='$angsuran' WHERE id_pinjaman='$id'";
                $sqlc=mysqli_query($connect, $queryc);
          echo "<script>alert('Proses Simpan Data Pembayaran Berhasil');
                document.location.href='dashboard.php?p=data_pembayaran_pinjaman_nasabah'</script>\n";
              }else{
                echo "<script>alert('Opss!, Data Pembayaran Pinjaman Gagal Disimpan');
                  document.location.href='dashboard.php?p=data_pinjaman_nasabah'</script>\n";
           }
         }
     }
  
 }
 }
?>