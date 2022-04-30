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
$pdf->MultiCell(15.5,0.6,'KOPERASI REMAJA PIKAT',0,'L');
$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(15.5,0.6,'Banjar Intaran Buug, Desa Pikat',0,'L'); 
$penerima = $_POST['penerima'];
$tahun = $_POST['tahun'];
$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Tabungan Nasabah: ".$penerima."/ Tahun: ".$tahun,0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$penerima = $_POST['penerima'];
$tahun = $_POST['tahun'];
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',8);
$pdf->Cell(1, 0.6, 'No', 1, 0, 'C');
$pdf->Cell(2, 0.6, 'ID Tabungan', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Id Nasabah', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Nama Nasabah', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Tahun', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Nama Penyetor', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Tgl. Setor', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'JT', 1, 0, 'L');
$pdf->Cell(1, 0.6, 'Bunga', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'TT', 1, 1, 'L');

$no=1;
$sql="SELECT * FROM tbl_tabungan_nasabah WHERE id_nasabah='$penerima' AND tahun='$tahun'";
$tampil=mysqli_query($connect, $sql);
while($lihat=mysqli_fetch_array($tampil)){
    $pdf->SetFont('Times','',7);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $pdf->Cell(2, 0.6, $lihat['id_tabungan_n'],1, 0, 'L');
    $pdf->Cell(3, 0.6, $lihat['id_nasabah'],1, 0, 'L');
    $query1="SELECT * FROM tbl_nasabah WHERE id_nasabah='".$lihat['id_nasabah']."'";
    $sql1=mysqli_query($connect, $query1);
    while ($data1=mysqli_fetch_array($sql1)) {
        $pdf->Cell(4, 0.6, $data1['nama_nasabah'],1, 0, 'L');
    }
    $pdf->Cell(2, 0.6, $lihat['tahun'],1, 0, 'L');
    $pdf->Cell(4, 0.6, $lihat['nama_penyetor'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['tgl_setoran'],1, 0, 'L');
    $pdf->Cell(3, 0.6,"Rp. ".number_format($lihat['jml_tabungan'], 2, ".", "."),1, 0, 'L');
    $pdf->Cell(1, 0.6, $lihat['bunga_tn'],1, 0, 'L');
    $pdf->Cell(3, 0.6,"Rp. ".number_format($lihat['total_tabungan'], 2, ".", "."),1, 1, 'L');
    $no++;
}
$pdf->ln(1);
$pdf->SetFont('Times','i',10);
$pdf->Cell(22.5,0.7,"Hasil Rekapitulasi Tabungan Nasabah Tahun: ".$tahun,0,0,'L');
$pdf->ln(1);
$no=1;
$pdf->SetFont('Times','B',8);
$pdf->Cell(1, 0.6, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.6, 'ID Nasabah', 1, 0, 'L');
$pdf->Cell(10, 0.6, 'Nama Nasabah', 1, 0, 'L');
$pdf->Cell(8, 0.6, 'Tahun', 1, 0, 'L');
$pdf->Cell(5.5, 0.6, 'Total Tabungan', 1, 1, 'L');

$sql_x="SELECT * FROM tbl_rekap_tabungan_nasabah WHERE id_nasabah='$penerima' AND tahun = '$tahun'";
$tampil_x=mysqli_query($connect, $sql_x);
while($lihat_x=mysqli_fetch_array($tampil_x)){
    $pdf->SetFont('Times','',10);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $pdf->Cell(3, 0.6, $lihat_x['id_nasabah'],1, 0, 'L');
    $query_a="SELECT * FROM tbl_nasabah WHERE id_nasabah='".$lihat_x['id_nasabah']."'";
    $sql_a=mysqli_query($connect, $query_a);
    while ($data_a=mysqli_fetch_array($sql_a)) {
        $pdf->Cell(10, 0.6, $data_a['nama_nasabah'],1, 0, 'L');
    }
    $pdf->Cell(8, 0.6, $lihat_x['tahun'],1, 0, 'L');
    $pdf->Cell(5.5, 0.6,"Rp. ".number_format($lihat_x['ttl_tabungan_nasabah'], 2, ".", "."),1, 1, 'L');
    $no++;
}

$order="SELECT * FROM tbl_rekap_tabungan_nasabah WHERE id_nasabah='$penerima' AND tahun='$tahun'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',10);
$result="SELECT SUM(ttl_tabungan_nasabah) AS ttl_tabungan_nasabah FROM  tbl_rekap_tabungan_nasabah
WHERE id_nasabah='$penerima' AND tahun='$tahun'";
 $sd=mysqli_query($connect, $result);
while($hasil=mysqli_fetch_object($sd))
{
    $pdf->Cell(22, 0.6,"Total Tabungan Nasabah",1, 0, '');
    $pdf->Cell(5.5, 0.6, "Rp. ".number_format($hasil->ttl_tabungan_nasabah, 2, ".", "."),1, 1, '');
}
$pdf->Output();
?>