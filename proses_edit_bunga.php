<?php
include"koneksi.php";
session_start();

$id=$_GET['id'];
$bm = $_POST['bm'];
$bt = $_POST['bt'];

$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_bunga  WHERE id_bunga='$id'")); 

  $query2="UPDATE tbl_bunga SET bunga_m='$bm', bunga_t='$bt' WHERE id_bunga='$id'";
  $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        if ($id==$iduser) {
          header("location:./data_bunga.php?notif=Data Anda Berhasil Diubah");
        }else{
          header("location:dashboard.php?p=data_bunga&notif=ubah-berhasil");
        }
      }else{
        header("location:dashboard.php?p=edit_bunga&id=".$id."&notif=gagal");
      }
?>