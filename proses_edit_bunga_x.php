<?php
include"koneksi.php";
session_start();

$id=$_GET['id'];
$ket=$_GET['ket'];
$bm = $_POST['bm'];

$query2="UPDATE tbl_bunga_x SET bunga_a='$bm' WHERE ket_bunga='$ket' AND id_bunga_x='$id'";
$sql2=mysqli_query($connect, $query2);
      if ($sql2) {
       echo "<script>alert('Data Bunga Berhasil Diubah');
                document.location.href='dashboard.php?p=data_bunga_x'</script>\n";
    }else{
      echo "<script>alert('Opss!!, Data Bunga  Gagal Diubah');
                document.location.href='dashboard.php?p=edit_bunga_x&id=".$id."'</script>\n";
    }
?>