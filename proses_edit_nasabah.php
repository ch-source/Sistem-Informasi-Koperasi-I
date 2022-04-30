<?php 
include"koneksi.php";

$id=$_GET['id'];
$nama = $_POST['nama'];
$notas = $_POST['notas'];
$tgl =$_POST['tgl'];
$jk = $_POST['jk'];
$tgp = $_POST['tgp'];
$alt =$_POST['alt'];
$notel =$_POST['notel'];
$status = $_POST['status'];
$pekerjaan = $_POST['pekerjaan'];

    $query="UPDATE tbl_nasabah SEt nama_nasabah='$nama', no_identitas='$notas', tgl_lahir='$tgl', jk='$jk', tgl_pengajuan='$tgp', alamat='$alt', no_tlpn='$notel', status='$status', pekerjaan='$pekerjaan' WHERE id_nasabah='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
    	$query_x=mysqli_query($connect, "UPDATE tbl_anggota_nasabah SET nama='$nama', no_identitas='$notas', tgl_lahir='$tgl', jk='$jk', tgl_pengajuan='$tgp', alamat='$alt', no_telepon='$notel', status='$status', pekerjaan='$pekerjaan', status_anggota='', level='Nasabah' WHERE nomor='$id'");
      echo "<script>alert('Data Nasabah Berhasil Diubah');
      document.location.href='dashboard.php?p=data_nasabah'</script>\n";
    }else{
      echo "<script>alert('Data Nasabah Gagal Diubah!');
      document.location.href='dashboard.php?p=edit_nasabah&id=".$id."'</script>\n";
    }
?>
