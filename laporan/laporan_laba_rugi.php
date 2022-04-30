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
$awal = $_POST['ta'];
$akhir = $_POST['tak'];
$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Laba Rugi Peride : ".$awal." s/d ".$akhir,0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(26, 0.6, 'Pendapatan', 0, 1, 'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(10, 0.6, '1. Pendapatan Bunga Pinjaman Anggota', 0, 0, 'L');
 $result="SELECT SUM(angsuran_bunga) AS angsuran_bunga FROM  tbl_pembayaran_pinjaman WHERE tgl_pembayaran BETWEEN '$awal' AND '$akhir'";
 $sd=mysqli_query($connect, $result);
 $hasil=mysqli_fetch_object($sd);
$pdf->Cell(8, 0.6,"Rp. ".number_format($hasil->angsuran_bunga, 2, ".", "."), 0, 0, 'L');
$pdf->Cell(8, 0.6,"", 0, 1, 'L');

$pdf->Cell(10, 0.6, '2. Pendapatan Bunga Pinjaman Nasabah', 0, 0, 'L');
  $result_a="SELECT SUM(angsuran_bunga) AS angsuran_bunga FROM  tbl_pembayaran_pinjaman_nasabah WHERE tgl_pembayaran BETWEEN '$awal' AND '$akhir'";
                     $sd_a=mysqli_query($connect, $result_a);
                     $hasil_a=mysqli_fetch_object($sd_a);
$pdf->Cell(8, 0.6,"Rp. ".number_format($hasil_a->angsuran_bunga, 2, ".", "."), 0, 0, 'L');
$pdf->Cell(8, 0.6,"", 0, 1, 'L');

$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 0.6, 'Total Pendapatan', 0, 0, 'L');
   $xap=$hasil_a->angsuran_bunga+$hasil->angsuran_bunga;
$pdf->Cell(8, 0.6,"", 0, 0, 'L');
$pdf->Cell(8, 0.6,"Rp. ".number_format($xap, 2, ".", "."), 0, 1, 'L');

$pdf->SetFont('Times','B',12);
$pdf->Cell(26, 0.6, 'Beban', 0, 1, 'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(10, 0.6, '1. Beban Bunga Tabungan Anggota', 0, 0, 'L');
 $result_c="SELECT SUM(jml_bunga) AS jml_bunga FROM  tbl_tabungan_anggota WHERE tanggal_setor BETWEEN '$awal' AND '$akhir'";
                     $sd_c=mysqli_query($connect, $result_c);
                     $hasil_c=mysqli_fetch_object($sd_c);
$pdf->Cell(8, 0.6,"Rp. ".number_format($hasil_c->jml_bunga, 2, ".", "."), 0, 0, 'L');
$pdf->Cell(8, 0.6,"", 0, 1, 'L');

$pdf->Cell(10, 0.6, '2. Pendapatan Bunga Pinjaman Nasabah', 0, 0, 'L');
  $result_b="SELECT SUM(jml_bunga) AS jml_bunga  FROM  tbl_tabungan_nasabah WHERE tgl_setoran BETWEEN '$awal' AND '$akhir'";
                     $sd_b=mysqli_query($connect, $result_b);
                     $hasil_b=mysqli_fetch_object($sd_b);
$pdf->Cell(8, 0.6,"Rp. ".number_format($hasil_b->jml_bunga, 2, ".", "."), 0, 0, 'L');
$pdf->Cell(8, 0.6,"", 0, 1, 'L');

$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 0.6, 'Total Beban', 0, 0, 'L');
    $xap_a=$hasil_c->jml_bunga+$hasil_b->jml_bunga;
$pdf->Cell(8, 0.6,"", 0, 0, 'L');
$pdf->Cell(8, 0.6,"Rp. ".number_format($xap_a, 2, ".", "."), 0, 1, 'L');
$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 0.6, 'Laba Rugi', 0, 0, 'L');
    $y=$xap-$xap_a;
$pdf->Cell(8, 0.6,"", 0, 0, 'L');
$pdf->Cell(8, 0.6,"Rp. ".number_format($y, 2, ".", "."), 0, 1, 'L');
$pdf->Output();
?>