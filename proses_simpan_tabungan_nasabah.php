<?php
include "koneksi.php";
$query = "SELECT max(id_tabungan_n) as maxId FROM tbl_tabungan_nasabah";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idtabungan = $data['maxId'];
$noUrut = (int) substr($idtabungan, 3, 3);
$noUrut++;
$char = "TBN";
$idtabungan= $char . sprintf("%03s", $noUrut);

$np=$_POST['np'];
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$tgls=$_POST['tgls'];
$npy=$_POST['npy'];
$jt=$_POST['jt'];
$bunga=$_POST['bunga'];
$jb=$_POST['jb'];
$tt=$_POST['tt'];

$cek = mysqli_query($connect, "SELECT * FROM tbl_rekap_tabungan_nasabah WHERE tahun = '$tahun' AND jml_bunga='$jb' AND id_nasabah = '$np'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
$stn=$data['ttl_tabungan_nasabah'];
$stn=$tt;

if ($result > 0) {
	$query1 = "INSERT INTO `tbl_tabungan_nasabah` (`id_tabungan_n`, `id_nasabah`, `periode`, `tahun`, `tgl_setoran`, `nama_penyetor` , `saldo_awal`, `bunga_awal`, `jml_tabungan`, `bunga_tn`, `jml_bunga`, `total_tabungan`) VALUES ('$idtabungan', '$np', '$bulan', '$tahun', '$tgls', '$npy', '', '', '$jt', '$bunga', '$jb', '$tt')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query2 = "UPDATE tbl_rekap_tabungan_nasabah SET ttl_tabungan_nasabah='$stn' WHERE tahun = '$tahun'  AND jml_bunga='$jb' AND id_nasabah = '$np'";
		$sql2 = mysqli_query($connect, $query2); 
		if ($sql2) {
			echo "<script>alert('Data Tabungan Nasabah Berhasil Disimpan');
		document.location.href='dashboard.php?p=data_tabungan_nasabah'</script>\n";
		}else{
			echo "<script>alert('Data Tabungan Nasabah Gagal Disimpan');
		document.location.href='dashboard.php?p=input_tabungan_nasabah'</script>\n";
		}
	}

}else if ($result ==0) {
	$query1 = "INSERT INTO `tbl_tabungan_nasabah` (`id_tabungan_n`, `id_nasabah`, `periode`, `tahun`, `tgl_setoran`, `nama_penyetor` , `saldo_awal`, `bunga_awal`, `jml_tabungan`, `bunga_tn`, `jml_bunga`, `total_tabungan`) VALUES ('$idtabungan', '$np', '$bulan', '$tahun', '$tgls', '$npy', '', '', '$jt', '$bunga', '$jb', '$tt')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query2 = "INSERT INTO `tbl_rekap_tabungan_nasabah` (`id_rn`, `id_nasabah`, `tahun`, `jml_bunga`, `ttl_tabungan_nasabah`) VALUES ('', '$np', '$tahun', '$jb', '$stn')";
		$sql2 = mysqli_query($connect, $query2); 
		if ($sql2) {
			echo "<script>alert('Data Tabungan Nasabah Berhasil Disimpan');
		document.location.href='dashboard.php?p=data_tabungan_nasabah'</script>\n";
		}else{
			echo "<script>alert('Data Tabungan Nasabah Gagal Disimpan');
		document.location.href='dashboard.php?p=input_tabungan_nasabah'</script>\n";
		}
	}
}
?>
