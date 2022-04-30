<?php
include "koneksi.php";
$query = "SELECT max(id_penarikan_n) as maxId FROM tbl_penarikan_nasabah";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idpenarikan = $data['maxId'];
$noUrut = (int) substr($idpenarikan, 3, 3);
$noUrut++;
$char = "PNK";
$idpenarikan= $char . sprintf("%03s", $noUrut);


$nasabah = $_POST['nasabah'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$tgl = $_POST['tgl'];
$jp = $_POST['jp'];

$query_penarikan="SELECT * FROM `tbl_rekap_tabungan_nasabah` WHERE tahun='$tahun' AND id_nasabah='$nasabah' GROUP BY `tahun`, `id_nasabah` WITH ROLLUP";
$sql_penarikan=mysqli_query($connect, $query_penarikan);
$data_penarikan=mysqli_fetch_array($sql_penarikan);
$ttltabungan=$data_penarikan['ttl_tabungan_nasabah']-$jp;
if ($jp>$data_penarikan['ttl_tabungan_nasabah']){
    echo "<script>alert('Oops! Jumlah Penarikan Lebih Besar Dari Total Tabungan ...');
    document.location.href='dashboard.php?p=data_penarikan_tabungan_nasabah'</script>\n";
}else{
         
         $query_a="INSERT INTO `tbl_penarikan_nasabah` (`id_penarikan_n`, `id_nasabah`, `periode_p`, `tahun_p`, `tgl_penarikan`, `jml_penarikan`) VALUES ('$idpenarikan', '$nasabah', '$bulan', '$tahun', '$tgl', '$jp')";
        $sql_a=mysqli_query($connect, $query_a);
        if ($sql_a) {
               $query_r="UPDATE tbl_rekap_tabungan_nasabah SET ttl_tabungan_nasabah='$ttltabungan' WHERE id_nasabah='$nasabah'";
               $sql_r=mysqli_query($connect, $query_r);
               if ($query_r) {
                    $query_x=mysqli_query($connect,"UPDATE tbl_tabungan_nasabah SET total_tabungan='$ttltabungan' WHERE total_tabungan='".$data_penarikan['ttl_tabungan_nasabah']."' AND tahun='$tahun' AND id_nasabah='$nasabah'");

                    echo "<script>alert('Proses Penarikan Berhasil');
                    document.location.href='dashboard.php?p=data_penarikan_tabungan_nasabah'</script>\n";
                }else{
                    echo "<script>alert('Proses Penarikan Gagal!');
                    document.location.href='dashboard.php?p=data_penarikan_tabungan_nasabah</script>\n";
                }
            }
        }
?>
 