<?php
include"koneksi.php";
session_start();

$id=$_GET['id'];
$nama = $_POST['nama'];
$level = $_POST['level'];
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
if ($data['level'] == 'Admin') {
  $iduser="".$data['id_user']."";

  $query2="UPDATE tbl_user SET nama_user='$nama', level='$level', username='$username', password='$password' WHERE id_user='$id'";
  $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        if ($id==$iduser) {
          header("location:./index.php?notif=Data Anda Berhasil Diubah, Silakan Login Kembali !!");
        }else{
          header("location:dashboard.php?p=data_users&notif=ubah-berhasil");
        }
      }else{
        header("location:dashboard.php?p=edit_users&id=".$id."&notif=gagal");
      }
    }
?>