<?php
include "koneksi.php";
$query = "SELECT max(id_simpanan) as maxId FROM tbl_simpanan_a";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idsimpanan = $data['maxId'];
$noUrut = (int) substr($idsimpanan, 3, 3);
$noUrut++;
$char = "SMP";
$idsimpanan= $char . sprintf("%03s", $noUrut);

$penerima=$_POST['penerima'];
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$tgl=$_POST['tgl'];
$sw=$_POST['sw'];
$tahun_a=date("Y");

$query1 = "INSERT INTO `tbl_simpanan_a` (`id_simpanan`, `id_anggota`, `periode`, `tahun`, `tgl_setor`, `simpanan_wajib`) VALUES ('$idsimpanan', '$penerima', '$bulan', '$tahun', '$tgl', '$sw')";
	$sql1 = mysqli_query($connect, $query1);
	if ($sql1) {
		$cek = mysqli_query($connect, "SELECT * FROM tbl_rekap_simpanan_a WHERE tahun = '$tahun_a' AND  id_anggota = '$penerima'");
		$result = mysqli_num_rows($cek);
		$data = mysqli_fetch_array($cek);
		$data1 = mysqli_fetch_array($cek);

		$ttlsimpanan=$data['ttl_simpanan'];
		$ttlsimpanan_a=$sw+$ttlsimpanan;

		if ($result > 0) {
			$query2 = "UPDATE tbl_rekap_simpanan_a SET ttl_simpanan='$ttlsimpanan_a' WHERE tahun = '$tahun_a' AND id_anggota = '$penerima'";
			$sql2 = mysqli_query($connect, $query2); 
			if ($sql2) {
				echo "<script>alert('Data Simpanan Anggota Berhasil Disimpan');
			document.location.href='dashboard.php?p=data_tabungan'</script>\n";
			}else{
				echo "<script>alert('Data Simpanan Anggota Gagal Disimpan');
			document.location.href='dashboard.php?p=data_tabungan'</script>\n";
			}
		}else if ($result ==0) {
			$query3 = "INSERT INTO `tbl_rekap_simpanan_a` (`id_rs`, `id_anggota`, `bulan`, `tahun`, `ttl_simpanan`) VALUES ('', '$penerima', '$bulan', '$tahun_a', '$sw')";
			$sql3 = mysqli_query($connect, $query3); 
				if ($sql3) {
					$query4 = "UPDATE tbl_anggota SET status_simpanan_awal='oke'  WHERE id_anggota = '$penerima'";
			$sql4 = mysqli_query($connect, $query4); 
			if ($sql4) {
					echo "<script>alert('Data Simpanan Anggota Berhasil Disimpan');
				document.location.href='dashboard.php?p=data_tabungan'</script>\n";
				}else{
					echo "<script>alert('Data Simpanan Anggota Gagal Disimpan');
				document.location.href='dashboard.php?p=data_tabungan'</script>\n";
				}
			}
		}
		}
?>
