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
$pdf->MultiCell(22.5,0.6,"Laporan Tunggakan: ".$penerima."/ Tahun: ".$tahun,0,'L'); 
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
$pdf->Cell(4, 0.6, 'Id Anggota', 1, 0, 'L');
$pdf->Cell(5, 0.6, 'Nama Anggota', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Tahun', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Angsuran Ke-', 1, 0, 'L');
$pdf->Cell(4, 0.6, 'Sisa Angsuran', 1, 0, 'L');
$pdf->Cell(5.4, 0.6, 'Total Sisa Angsuran', 1, 1, 'L');

$no=1;
$sql="SELECT * FROM tbl_pembayaran_pinjaman WHERE id_anggota='$penerima' AND tahun='$tahun'";
$tampil=mysqli_query($connect, $sql);
while($lihat=mysqli_fetch_array($tampil)){
    $pdf->SetFont('Times','',7);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $pdf->Cell(4, 0.6, $lihat['id_anggota'],1, 0, 'L');
    $query1="SELECT * FROM tbl_anggota WHERE id_anggota='".$lihat['id_anggota']."'";
    $sql1=mysqli_query($connect, $query1);
    while ($data1=mysqli_fetch_array($sql1)) {
        $pdf->Cell(5, 0.6, $data1['nama_anggota'],1, 0, 'L');
    }
    $pdf->Cell(4, 0.6, $lihat['tahun'],1, 0, 'L');
    $pdf->Cell(4, 0.6, $lihat['angsuran_k'],1, 0, 'L');
    $pdf->Cell(4, 0.6, $lihat['sisa_angsuran'],1, 0, 'L');
    $pdf->Cell(5.4, 0.6,"Rp. ".number_format($lihat['total_tunggakan'], 2, ".", "."),1, 1, 'L');
    $no++;
}
$pdf->SetFont('Times','B',7);
$order="SELECT * FROM tbl_pembayaran_pinjaman WHERE id_anggota='$penerima' AND tahun='$tahun'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',7);
$result="SELECT SUM(total_tunggakan) AS total_tunggakan FROM  tbl_pembayaran_pinjaman
WHERE id_anggota='$penerima' AND tahun='$tahun'";
 $sd=mysqli_query($connect, $result);
while($hasil=mysqli_fetch_object($sd))
{
    $pdf->Cell(22, 0.6,"Total Sisa Angsuran",1, 0, '');
    $pdf->Cell(5.4, 0.6, "Rp. ".number_format($hasil->total_tunggakan, 2, ".", "."),1, 1, '');
}

$pdf->Output();
?>