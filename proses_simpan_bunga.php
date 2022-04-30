<?php
include "koneksi.php";
$query = "SELECT max(id_bunga) as maxId FROM tbl_bunga";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idbunga = $data['maxId'];
$noUrut = (int) substr($idbunga, 3, 3);
$noUrut++;
$char = "BNG";
$idbunga= $char . sprintf("%03s", $noUrut);

$bm = $_POST['bm'];
$bt = $_POST['bt'];


$cek = mysqli_query($connect, "SELECT * FROM tbl_bunga WHERE id_bunga = '$idbunga'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
if ($result > 0) {
	header("location:dashboard.php?p=data_bunga&notif=username-ada");
}else if ($result ==0){
	$query1 = "INSERT INTO `tbl_bunga` (`id_bunga`, `bunga_m`, `bunga_t`) VALUES ('$idbunga', '$bm', '$bt')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
			header("location:dashboard.php?p=data_bunga&notif=berhasil");
		}else{
			header("location:dashboard.php?p=data_bunga&notif=gagal");
		}
	}
?>