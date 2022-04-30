<?php
include "koneksi.php";

$id=$_GET['id'];
$np=$_POST['np'];
$npy=$_POST['npy'];
$ni=$_POST['ni'];
$jklm=$_POST['jklm'];
$alm=$_POST['alm'];
$tgls=$_POST['tgls'];
$jsmp=$_POST['jsmp'];
$jm=$_POST['jm'];

$cek = mysqli_query($connect, "SELECT * FROM tbl_rekap_simpanan_nasabah WHERE nama_penyetor = '$npy' AND tgl_setoran = '$tgls' AND jenis_smpnn= '$jsmp' AND  id_nasabah = '$np'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
$tsn=$data['ttl_simpanan_nasabah'];
$tsn=$jm;
if ($result > 0) {
	$query1 = "UPDATE tbl_simpanan_nasabah SET id_nasabah='$np', nama_penyetor='$npy', no_identitas='$ni', jns_klmn='$jklm', almt='$alm', tgl_setoran='$tgls', jenis_smpnn='$jsmp', jml_smpnn='$jm' WHERE id_simpanan_n='$id'";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query2 = "UPDATE tbl_rekap_simpanan_nasabah SET ttl_simpanan_nasabah='$tsn' WHERE tgl_setoran = '$tgls' AND jenis_smpnn = '$jsmp' AND nama_penyetor= '$npy' AND id_nasabah = '$np'";
		$sql2 = mysqli_query($connect, $query2); 
		if ($sql2) {
			echo "<script>alert('Data Simpanan Nasabah Berhasil Diubah');
		document.location.href='dashboard.php?p=data_simpanan_nasabah'</script>\n";
		}else{
			echo "<script>alert('Data Simpanan Nasabah Gagal Diubah');
		document.location.href='dashboard.php?p=edit_simpanan_nasabah'</script>\n";
		}
	}

}else if ($result ==0) {
	$query1 = "INSERT INTO `tbl_simpanan_nasabah` (`id_simpanan_n`, `id_nasabah`, `nama_penyetor` , `no_identitas`,`jns_klmn`, `almt`, `tgl_setoran`, `jenis_smpnn`, `jml_smpnn`) VALUES ('$id', '$np', '$npy', '$ni', '$jklm', '$alm', '$tgls', '$jsmp', '$jm')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query2 = "INSERT INTO `tbl_rekap_simpanan_nasabah` (`id_rn`, `id_nasabah`, `nama_penyetor`, `jenis_smpnn`, `tgl_setoran`, `ttl_simpanan_nasabah`) VALUES ('', '$np', '$npy', '$jsmp', '$tgls', '$tsn')";
		$sql2 = mysqli_query($connect, $query2); 
		if ($sql2) {
			echo "<script>alert('Data Simpanan Nasabah Berhasil Diubah');
		document.location.href='dashboard.php?p=data_simpanan_nasabah'</script>\n";
		}else{
			echo "<script>alert('Data Simpanan Nasabah Gagal Diubah');
		document.location.href='dashboard.php?p=edit_simpanan_nasabah'</script>\n";
		}
	}
}
$query1 = "UPDATE tbl_simpanan_nasabah SET id_nasabah='$np', nama_penyetor='$npy', no_identitas='$ni', jns_klmn='$jklm', almt='$alm', tgl_setoran='$tgls', jenis_smpnn='$jsmp', jml_smpnn='$jm' WHERE id_simpanan_n='$id'";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		echo "<script>alert('Data Simpanan Nasabah Berhasil Diubah');
		document.location.href='dashboard.php?p=data_simpanan_nasabah'</script>\n";
    }else{
        echo "<script>alert('Data Nasabah Gagal Diubah!');
      document.location.href='dashboard.php?p=edit_simpanan_nasabah&id=".$id."'</script>\n";
       }
?>
