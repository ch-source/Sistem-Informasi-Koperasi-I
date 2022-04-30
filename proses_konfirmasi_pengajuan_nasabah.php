<?php
include"koneksi.php";
$id=$_GET['id'];

$query1 = "UPDATE tbl_pinjaman_nasabah SET status_pinjaman='Sudah Dikonfirmasi' WHERE id_pinjaman='$id'";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		echo "<script>alert('Proses Konfirmasi Berhasil');
                document.location.href='dashboard_kk.php?p=data_pinjaman_nasabah'</script>\n";
		}else{
		echo "<script>alert('Proses Konfirmasi Gagal');
                document.location.href='dashboard_kk.php?p=detail_pinjaman_nasabah'</script>\n";
    }

?>