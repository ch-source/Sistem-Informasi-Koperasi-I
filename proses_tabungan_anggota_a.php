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
$bulan =$_POST['bulan'];
$tahun= $_POST['tahun'];
$tgl=$_POST['tgl'];
$jta=$_POST['jta'];
$bunga=$_POST['bunga'];
$tb=$_POST['tb'];
$tt=$_POST['tt'];
$jb=$_POST['jb'];
$tsa=$_POST['tsa'];
$tahun_a=date("Y");

$query1 = "INSERT INTO `tbl_tabungan` (`id_tabungan`, `nomor`, `periode`, `tahun`, `tgl_tabung`, `nama`, `saldo_awal`, `bunga_awal`, `jumlah_tabungan`, `bunga_tabungan`, `jumlah_bunga`, `total_tabungan`) VALUES ('$idtabungana', '$id', '$bulan', '$tahun', '$tgl', '', '', '', '$tsa', '$bunga', '$tb', '$tt')";
	$sql1 = mysqli_query($connect, $query1);
	if ($sql1) {
		$cek = mysqli_query($connect, "SELECT * FROM tbl_rekap_tabungan_anggota WHERE tahun_a = '$tahun_a' AND  id_anggota = '$penerima'");
		$result = mysqli_num_rows($cek);
		$data = mysqli_fetch_array($cek);
		$data1 = mysqli_fetch_array($cek);

		$jma=$tt;
		$x=$jb+$data['jml_bunga'];
		$y=$tsa+$data['ttl_tabungan'];

		if ($result > 0) {
			$query2 = "UPDATE tbl_rekap_tabungan_anggota SET jml_bunga='$x', ttl_tabungan='$y' WHERE tahun_a = '$tahun_a' AND id_anggota = '$penerima'";
			$sql2 = mysqli_query($connect, $query2); 
			if ($sql2) {
				echo "<script>alert('Data Tabungan Anggota Berhasil Disimpan');
			document.location.href='dashboard.php?p=data_tabungan'</script>\n";
			}else{
				echo "<script>alert('Data Tabungan Anggota Gagal Disimpan');
			document.location.href='dashboard.php?p=data_tabungan'</script>\n";
			}
		}else if ($result ==0) {
			$query3 = "INSERT INTO `tbl_rekap_tabungan_anggota` (`id_ra`, `id_anggota`, `tahun_a`, `jml_bunga`, `ttl_tabungan`) VALUES ('', '$penerima', '$tahun_a', '$jb', '$tsa')";
			$sql3 = mysqli_query($connect, $query3); 
				if ($sql3) {
					$query4 = "UPDATE tbl_anggota SET status_tbngan_awal='oke'  WHERE id_anggota = '$id'";
			$sql4 = mysqli_query($connect, $query4); 
			if ($sql4) {
					echo "<script>alert('Data Tabungan Anggota Berhasil Disimpan');
				document.location.href='dashboard.php?p=data_tabungan'</script>\n";
				}else{
					echo "<script>alert('Data Tabungan Anggota Gagal Disimpan');
				document.location.href='dashboard.php?p=data_tabungan'</script>\n";
				}
			}
		}
		}
?>




