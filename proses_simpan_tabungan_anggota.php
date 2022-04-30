<?php
include "koneksi.php";
$query = "SELECT max(id_tabungan_a) as maxId FROM tbl_tabungan_anggota";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idtabungana = $data['maxId'];
$noUrut = (int) substr($idtabungana, 3, 3);
$noUrut++;
$char = "TBN";
$idtabungana= $char . sprintf("%03s", $noUrut);

$penerima=$_POST['penerima'];
$tgl=$_POST['tgl'];
$jta=$_POST['jta'];
$bunga=$_POST['bunga'];
$jb=$_POST['jb'];
$tt=$_POST['tt'];

$cek = mysqli_query($connect, "SELECT * FROM tbl_rekap_tabungan_anggota WHERE tahun_a = '".date('Y')."' AND jml_bunga='$jb' AND  id_anggota = '$penerima'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
$data1 = mysqli_fetch_array($cek);
$jma=$data['ttl_tabungan']+$jb;
$jma=$tt;

if ($result > 0) {
	$query1 = "INSERT INTO `tbl_tabungan_anggota` (`id_tabungan_a`, `id_anggota`, `periode_a`, `tahun_a`, `tanggal_setor`, `nama_penyetor`, `saldo_awal`, `bunga_awal`, `jumlah_tabungan`, `bunga_ta`, `jml_bunga`, `total_tabungan`) VALUES ('$idtabungana', '$penerima', '', '', '$tgl', '', '', '', '$jta', '$bunga', '$jb', '$tt')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query2 = "UPDATE tbl_rekap_tabungan_anggota SET ttl_tabungan='$jma' WHERE jml_bunga='$jb' AND tahun_a = '".date('Y')."' AND id_anggota = '$penerima'";
		$sql2 = mysqli_query($connect, $query2); 
		if ($sql2) {
			echo "<script>alert('Data Tabungan Anggota Berhasil Disimpan');
		document.location.href='dashboard.php?p=data_tabungan_anggota'</script>\n";
		}else{
			echo "<script>alert('Data Tabungan Anggota Gagal Disimpan');
		document.location.href='dashboard.php?p=input_tabungan_anggota'</script>\n";
		}
	}

}else if ($result ==0) {
	$query1 = "INSERT INTO `tbl_tabungan_anggota` (`id_tabungan_a`, `id_anggota`, `periode_a`, `tahun_a`, `tanggal_setor`, `nama_penyetor`, `saldo_awal`, `bunga_awal`, `jumlah_tabungan`, `bunga_ta`, `jml_bunga`, `total_tabungan`) VALUES ('$idtabungana', '$penerima', '', '', '$tgl', '', '', '', '$jta', '$bunga', '$jb', '$tt')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query2 = "INSERT INTO `tbl_rekap_tabungan_anggota` (`id_ra`, `id_anggota`, `tahun_a`, `jml_bunga`, `ttl_tabungan`) VALUES ('', '$penerima', '".date('Y')."', '$jb', '$jma')";
		$sql2 = mysqli_query($connect, $query2); 
		if ($sql2) {
			echo "<script>alert('Data Tabungan Anggota Berhasil Disimpan');
		document.location.href='dashboard.php?p=data_tabungan_anggota'</script>\n";
		}else{
			echo "<script>alert('Data Tabungan Anggota Gagal Disimpan');
		document.location.href='dashboard.php?p=input_tabungan_anggota'</script>\n";
		}
	}
}
?>
