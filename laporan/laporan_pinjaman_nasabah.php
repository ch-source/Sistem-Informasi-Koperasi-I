<?php
include'koneksi.php';
include"fpdf.php";
require('makefont/makefont.php');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->SetX(1.6);            
$pdf->MultiCell(15.5,0.6,'KOPERASI BHAKTI SEJAHTERA',0,'L');
$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(15.5,0.6,'Jl. Tukad Musi No. 1, Renon - Denpasar',0,'L'); 
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Pinjaman Periode: ".$bulan."/ Tahun: ".$tahun,0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',8);
$pdf->Cell(1, 0.6, 'No', 1, 0, 'C');
$pdf->Cell(2, 0.6, 'ID Pinjaman', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Id Nasabah', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Nama Nasabah', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Tahun', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Tgl. Pinjam', 1, 0, 'L');
$pdf->Cell(2.5, 0.6, 'JJ', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'JB', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Bunga', 1, 0, 'L');
$pdf->Cell(2.9, 0.6, 'JW', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'JP', 1, 1, 'L');

$no=1;
$sql="SELECT * FROM tbl_pinjaman_nasabah WHERE periode='$bulan' AND tahun='$tahun'";
$tampil=mysqli_query($connect, $sql);
while($lihat=mysqli_fetch_array($tampil)){
    $pdf->SetFont('Times','',7);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $pdf->Cell(2, 0.6, $lihat['id_pinjaman'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['id_nasabah'],1, 0, 'L');
    $query1="SELECT * FROM tbl_nasabah WHERE id_nasabah='".$lihat['id_nasabah']."'";
    $sql1=mysqli_query($connect, $query1);
    while ($data1=mysqli_fetch_array($sql1)) {
        $pdf->Cell(4, 0.6, $data1['nama_nasabah'],1, 0, 'L');
    }
    $pdf->Cell(2, 0.6, $lihat['tahun'],1, 0, 'L');
    $pdf->Cell(4, 0.6, $lihat['tgl_pinjam'],1, 0, 'L');
    $pdf->Cell(2.5, 0.6, $lihat['jenis_jaminan'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['jenis_bunga'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['bunga'],1, 0, 'L');
    $pdf->Cell(2.9, 0.6, $lihat['jangka_waktu'],1, 0, 'L');
    $pdf->Cell(3, 0.6,"Rp. ".number_format($lihat['jumlah_pinjaman'], 2, ".", "."),1, 1, 'L');
    $no++;
}
$pdf->SetFont('Times','B',7);
$order="SELECT * FROM tbl_pinjaman_nasabah WHERE periode='$bulan' AND tahun='$tahun'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',7);
$result="SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM  tbl_pinjaman_nasabah
WHERE periode='$bulan' AND tahun='$tahun'";
 $sd=mysqli_query($connect, $result);
while($hasil=mysqli_fetch_object($sd))
{
    $pdf->Cell(24.4, 0.6,"Total Pinjaman",1, 0, '');
    $pdf->Cell(3, 0.6, "Rp. ".number_format($hasil->jumlah_pinjaman, 2, ".", "."),1, 1, '');
}
$pdf->ln(1);
$pdf->SetFont('Times','i',10);
$pdf->Cell(22.5,0.7,"Rekapitulasi Pinjaman Terbesar Nasabah Periode: ".$bulan." Tahun: ".$tahun,0,0,'L');
$pdf->ln(1);
$no=1;
$pdf->SetFont('Times','B',8);
$pdf->Cell(1, 0.6, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.6, 'Id Nasabah', 1, 0, 'L');
$pdf->Cell(8, 0.6, 'Nama Nasabah', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Tgl. Pinjam', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'JP', 1, 1, 'L');


$sql_x="SELECT * FROM tbl_pinjaman_nasabah WHERE periode='$bulan' AND tahun= '$tahun' AND jumlah_pinjaman > 10000000";
$tampil_x=mysqli_query($connect, $sql_x);
while($lihat_x=mysqli_fetch_array($tampil_x)){
    $pdf->SetFont('Times','',10);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $pdf->Cell(4, 0.6, $lihat_x['id_nasabah'],1, 0, 'L');
    $query_a="SELECT * FROM tbl_nasabah WHERE id_nasabah='".$lihat_x['id_nasabah']."'";
    $sql_a=mysqli_query($connect, $query_a);
    while ($data_a=mysqli_fetch_array($sql_a)) {
        $pdf->Cell(8, 0.6, $data_a['nama_nasabah'],1, 0, 'L');
    }
    $pdf->Cell(3, 0.6, $lihat_x['tgl_pinjam'],1, 0, 'L');
    $pdf->Cell(3, 0.6, "Rp. ".number_format($lihat_x['jumlah_pinjaman'], 2, ".", "."),1, 1, 'L');
    $no++;
}

$order="SELECT * FROM tbl_pinjaman_nasabah WHERE periode='$bulan' AND tahun='$tahun' AND jumlah_pinjaman > 10000000";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',10);
$result="SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM  tbl_pinjaman_anggota
WHERE periode='$bulan' AND tahun='$tahun' AND jumlah_pinjaman > 10000000";
 $sd=mysqli_query($connect, $result);
while($hasil=mysqli_fetch_object($sd))
{
    $pdf->Cell(16, 0.6,"Total Pinjaman Nasabah",1, 0, '');
    $pdf->Cell(3, 0.6, "Rp. ".number_format($hasil->jumlah_pinjaman, 2, ".", "."),1, 1, '');
    $pdf->Cell(16, 0.6,"Jumlah Nasabah",1, 0, '');
    $pdf->Cell(3, 0.6, $count,1, 1, '');
}


$pdf->Output();
?>