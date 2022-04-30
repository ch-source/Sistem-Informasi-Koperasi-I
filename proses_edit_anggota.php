<?php 
include"koneksi.php";

$id=$_GET['id'];
$nama = $_POST['nama'];
$notas = $_POST['notas'];
$jk = $_POST['jk'];
$tgl =$_POST['tgl'];
$tgp =$_POST['tgp'];
$alt =$_POST['alt'];
$notel =$_POST['notel'];
$status =$_POST['status'];
$pekerjaan =$_POST['pekerjaan'];

    $query="UPDATE tbl_anggota SEt nama_anggota='$nama', no_identitas='$notas', jk='$jk', tgl_lahir='$tgl',  tgl_pengajuan='$tgp', alamat='$alt', no_tlpn='$notel', status='$status', pekerjaan='$pekerjaan' WHERE id_anggota='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
    	$query_x=mysqli_query($connect, "UPDATE tbl_anggota_nasabah SET nama='$nama', no_identitas='$notas', tgl_lahir='$tgl', jk='$jk', tgl_pengajuan='$tgp', alamat='$alt', no_telepon='$notel', status='$status', pekerjaan='$pekerjaan', status_anggota='', level='Anggota' WHERE nomor='$id'");
      echo "<script>alert('Data Anggota Berhasil Diubah');
      document.location.href='dashboard.php?p=data_anggota'</script>\n";
    }else{
      echo "<script>alert('Data Anggota Gagal Diubah!');
      document.location.href='dashboard.php?p=edit_anggota&id=".$id."'</script>\n";
    }
?>