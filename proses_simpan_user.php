<?php
include "koneksi.php";
$query = "SELECT max(id_user) as maxId FROM tbl_user";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$iduser = $data['maxId'];
$noUrut = (int) substr($iduser, 3, 3);
$noUrut++;
$char = "USR";
$iduser= $char . sprintf("%03s", $noUrut);

$nama=$_POST['nama'];
$level=$_POST['level'];
$username=$_POST['username'];
$password=$_POST['password'];
$cek = mysqli_query($connect, "SELECT * FROM tbl_user WHERE username = '$username'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
if ($result > 0) {
	header("location:dashboard.php?p=data_users&notif=username-ada");
}else if ($result ==0){
	$query1 = "INSERT INTO `tbl_user` (`id_user`, `nama_user`, `level`, `username`, `password`) VALUES ('$iduser', '$nama', '$level', '$username', '$password')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
			header("location:dashboard.php?p=data_users&notif=berhasil");
		}else{
			header("location:dashboard.php?p=data_users&notif=gagal");
		}
	}
?>