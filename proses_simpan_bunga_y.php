<?php
include"koneksi.php";
	
	$id = $_POST['id'];
	$jns = $_POST['jns'];
	$bm = $_POST['bm'];
	$bt = $_POST['bt'];
	$query1= "INSERT INTO `tbl_bunga_x` (`id_bunga_x`, `jenis_bunga`, `bunga_a`, `ket_bunga`) VALUES ('$id', '$jns', '$bm', 'Bunga Menurun')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		include "koneksi.php";
              $query = "SELECT max(id_bunga_x) as maxId FROM tbl_bunga_x";
              $hasil = mysqli_query($connect,$query);
              $data = mysqli_fetch_array($hasil);
              $idbunga = $data['maxId'];
              $noUrut = (int) substr($idbunga, 3, 3);
              $noUrut++;
              $char = "BUN";
              $idbunga= $char . sprintf("%03s", $noUrut);
		$query2= "INSERT INTO `tbl_bunga_x` (`id_bunga_x`, `jenis_bunga`, `bunga_a`, `ket_bunga`) VALUES ('$idbunga', '$jns', '$bt', 'Bunga Tetap')";
		$sql2 = mysqli_query($connect, $query2); 
			echo "<script>alert('Data Bunga Pinjaman Berhasil Disimapn');
                document.location.href='dashboard.php?p=data_bunga_x'</script>\n";
		}else{
			echo "<script>alert('Opss!!, Data Bunga Pinjaman Gagal Disimapn');
                document.location.href='dashboard.php?p=data_bunga_x'</script>\n";
		}

?>