<?php
include "koneksi.php";
$total = $_GET['total'];
$nama = $_GET['nama'];
$kode = $_GET['kode'];
$id = $_POST['id'];
$tgl = $_POST['tgl'];
$jp = $_POST['jp'];
$sisa_tb= $_POST['sisa_tb'];


$tahun=date("Y");
    $query_a="INSERT INTO `tbl_penarikan` (`id_penarikan`, `id_anggota`, `periode`, `tahun`, `tgl_penarikan`, `jml_penarikan`) VALUES ('$id', '$nama', '', '', '$tgl', '$jp')";
        $sql_a=mysqli_query($connect, $query_a);
        if ($sql_a) {
              
                $query_x=mysqli_query($connect,"UPDATE tbl_tabungan SET total_tabungan='$sisa_tb' WHERE id_tabungan='$kode'");
                    echo "<script>alert('Data Penarikan Berhasil Diinput');
                    document.location.href='dashboard.php?p=data_penarikkan'</script>\n";
                }else{
                    echo "<script>alert('Data Penarikan Gagal Diinput!');
                    document.location.href='dashboard.php?p=data_penarikkan</script>\n";
                }
            
        
?>
