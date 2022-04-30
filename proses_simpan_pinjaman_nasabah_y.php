<?php
include"koneksi.php";
$query_user = "SELECT max(id_pinjaman) as maxId FROM tbl_pinjaman_nasabah";
$hasil_user = mysqli_query($connect,$query_user);
$data_user = mysqli_fetch_array($hasil_user);
$idpinjaman = $data_user['maxId'];
$noUser = (int) substr($idpinjaman, 3, 3);
$noUser++;
$char = "PJM";
$idpinjaman= $char . sprintf("%03s", $noUser);

$nim  = $_POST['nim'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$no_tlpn = $_POST['no_tlpn'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];
$statusnikah = $_POST['statusnikah'];
$jenisjaminan = $_POST['jenisjaminan'];
$bg = $_POST['bg'];
$bunga_a = $_POST['bunga_a'];
$jw = $_POST['jw'];
$jp = $_POST['jp'];

if ($jp > 10000000) {
   echo "<script>alert('Proses Pengajuan Pinjaman Gagal!, Pinjaman Yang Anda Masukkan Melebihi Maximum Pinjaman, Silahkan Masukkan Jumlah Pinjaman Yang Sesuai !!');
    document.location.href='dashboard.php?p=data_pinjaman_nasabah'</script>\n";
}else{
$query2="INSERT INTO `tbl_pinjaman_nasabah` (`id_pinjaman`, `id_nasabah`, `tgl_pinjam`, `periode`, `tahun`, `no_telepon`, `alamat`, `pekerjaan`, `status_peminjam`, `jenis_jaminan`, `jenis_bunga`, `bunga`, `jangka_waktu`, `angsuran_k`, `jumlah_pinjaman`, `status_pinjaman`, `status`) VALUES ('$idpinjaman', '$nim', '$tgl_pinjam', '$bulan', '$tahun', '$no_tlpn', '$alamat', '$pekerjaan', '$statusnikah', '$jenisjaminan', '$bg', '$bunga_a', '$jw', '1', '$jp', '', '' )";
           $sql2=mysqli_query($connect, $query2);
           if ($sql2) {
           echo "<script>alert('Proses Pengajuan Berhasil');
                document.location.href='dashboard.php?p=data_pinjaman_nasabah'</script>\n";
              }else{
                echo "<script>alert('Proses Pengajuan Gagal!');
                document.location.href='dashboard.php?p=input_pinjaman_nasabah'</script>\n";
           }
       }   
?>
