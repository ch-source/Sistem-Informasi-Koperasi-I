<?php
include"koneksi.php";

	$id = $_POST['id'];
	$bg= $_POST['bg'];
	$jns = $_POST['jns'];
	$query1 = "INSERT INTO `tbl_bunga_x` (`id_bunga_x`, `jenis_bunga`, `bunga_a`, `ket_bunga`) VALUES ('$id', '$jns', '$bg', 'Bunga Simpanan')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
			echo "<script>alert('Data Bunga Simpanan Berhasil Ditambahkan');
                document.location.href='dashboard.php?p=data_bunga_x'</script>\n";
		}else{
			echo "<script>alert('Opss!!, Data Bunga Simpanan Gagal Ditambahkan');
                document.location.href='dashboard.php?p=data_bunga_x'</script>\n";
		}

?>