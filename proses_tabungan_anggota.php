<?php
include "koneksi.php";
$query = "SELECT max(id_tabungan) as maxId FROM tbl_tabungan";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idtabungana = $data['maxId'];
$noUrut = (int) substr($idtabungana, 3, 3);
$noUrut++;
$char = "TBN";
$idtabungana= $char . sprintf("%03s", $noUrut);
$id=$_GET['id'];
$penerima=$_POST['penerima'];
$tgl=$_POST['tgl'];
$jta=$_POST['jta'];
$bunga=$_POST['bunga'];
$tb=$_POST['tb'];
$tt=$_POST['tt'];
$jb=$_POST['jb'];
$tsa=$_POST['tsa'];
$tahun_a=date("Y");

$query1 = "INSERT INTO `tbl_tabungan` (`id_tabungan`, `nomor`, `periode`, `tahun`, `tgl_tabung`, `nama`, `saldo_awal`, `bunga_awal`, `jumlah_tabungan`, `bunga_tabungan`, `jumlah_bunga`, `total_tabungan`) VALUES ('$idtabungana', '$id', '', '', '$tgl', '', '', '', '$tsa', '$bunga', '$tb', '$tt')";
$sql1 = mysqli_query($connect, $query1);
	if ($sql1) {
		$query4 = "UPDATE tbl_nasabah SET status_tbngan_awal='oke'  WHERE id_nasabah = '$id'";
			$sql4 = mysqli_query($connect, $query4); 
			if ($sql4) {
		echo "<script>alert('Data Tabungan Nasabah Berhasil Disimpan');
			document.location.href='dashboard.php?p=data_tabungan'</script>\n";
			}else{
				echo "<script>alert('Data Tabungan Nasabah Gagal Disimpan');
			document.location.href='dashboard.php?p=data_tabungan'</script>\n";
			
		}
	}
?>
