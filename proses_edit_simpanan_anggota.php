<?php 
include"koneksi.php";

$id=$_GET['id'];
$penerima=$_POST['penerima'];
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$penyetor=$_POST['penyetor'];
$notas=$_POST['notas'];
$jkl=$_POST['jkl'];
$alt=$_POST['alt'];
$tgl=$_POST['tgl'];
$jms=$_POST['jms'];

    $query="UPDATE tbl_simpanan_a SEt id_anggota='$penerima', periode='$bulan', tahun='$tahun', nama_penyetor='$penyetor',  no_identitas='$notas', jk='$jkl', alamat='$alt', tgl_setor='$tgl', jml_simpanan='$jms' WHERE id_simpanan='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
      echo "<script>alert('Data Simpanan Anggota Berhasil Diubah');
      document.location.href='dashboard.php?p=data_simpanan_anggota'</script>\n";
    }else{
      echo "<script>alert('Data Simpanan Anggota Gagal Diubah!');
      document.location.href='dashboard.php?p=edit_simpanan_anggota&id=".$id."'</script>\n";
    }else{
    	$query_a="UPDATE tbl_simpanan_a SEt id_anggota='$penerima', periode='$bulan', tahun='$tahun', nama_penyetor='$penyetor',  no_identitas='$notas', jk='$jkl', alamat='$alt', tgl_setor='$tgl', jml_simpanan='$jms' WHERE id_simpanan='$id'";
    $sql_a=mysqli_query($connect, $query_a);
    if ($sql_a) {
      echo "<script>alert('Data Simpanan Anggota Berhasil Diubah');
      document.location.href='dashboard.php?p=data_simpanan_anggota'</script>\n";
    }else{
      echo "<script>alert('Data Simpanan Anggota Gagal Diubah!');
      document.location.href='dashboard.php?p=edit_simpanan_anggota&id=".$id."'</script>\n";
    }
 }
?>
