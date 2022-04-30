<?php
include'koneksi.php';
session_start();
include"fpdf.php";
require('makefont/makefont.php');
$pdf = new FPDF("P","cm","A4");
$nasabah = $_POST['nasabah'];
$tgl = $_POST['tgl'];
$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'Pegawai') {
                    $konten = $data['nama_user'];
                }

$sql="SELECT * FROM tbl_pembayaran_pinjaman_nasabah WHERE tgl_pembayaran='$tgl' AND id_nasabah='$nasabah'";
$tampil=mysqli_query($connect, $sql);
$lihat=mysqli_fetch_array($tampil);
$bayar=$lihat['angsuran_pokok']+$lihat['angsuran_bunga'];
$sql1="SELECT * FROM tbl_nasabah WHERE id_nasabah='$nasabah'";
$tampil1=mysqli_query($connect, $sql1);
$lihat1=mysqli_fetch_array($tampil1);
$pdf->SetMargins(2,1,2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Cell(11,0.5,"Koperasi Bhakti Sejahtera",0,0,'L');
$pdf->Cell(3,0.5,"User",0,0,'L');
$pdf->Cell(1,0.5,":",0,0,'L');
$pdf->Cell(5,0.5,$konten,0,1,'L');
$pdf->Cell(11,0.5,"Jl. Tukad Musi No. 1, Renon - Denpasar",0,0,'L');
$pdf->Cell(3,0.5,"Tgl. Transaksi",0,0,'L');
$pdf->Cell(1,0.5,":",0,0,'L');
$pdf->Cell(5,0.5,$tgl,0,1,'L');
$pdf->Cell(11,0.5,"Hal : Slip Pembayaran",0,1,'L');
$pdf->Cell(20,0.5,"------------------------------------------------------------------------------------------------------------------------------------------------",0,1,'L');
$pdf->SetFont('Times','i',10);
    $pdf->Cell(5, 0.6,"ID Pembayaran",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(10, 0.6, $lihat['id_pembayaran'],0, 1, 'L');
    $pdf->Cell(5, 0.6,"Peminjam",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(10, 0.6, $lihat['id_nasabah']."-".$lihat1['nama_nasabah'],0, 1, 'L');
    $pdf->Cell(5, 0.6,"Tgl. Pembayaran",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(10, 0.6, $lihat['tgl_pembayaran'],0, 1, 'L');
    $pdf->Cell(5, 0.6,"Angsuran Ke-",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(10, 0.6, $lihat['angsuran_k'],0, 1, 'L');
    $pdf->Cell(5, 0.6," Sisa Angsuran",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(10, 0.6, $lihat['sisa_angsuran'],0, 1, 'L');
    $pdf->Cell(10, 0.6,"Jumlah Pinjaman",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(5, 0.6,"Rp. ".number_format($lihat['jumlah_pinjaman'], 2, ".", ",") ,0, 1, 'L');
    $pdf->Cell(6, 0.6,"Angsuran Pokok",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(5, 0.6,"Rp. ".number_format($lihat['angsuran_pokok'], 2, ".", ",") ,0, 1, 'L');
    $pdf->Cell(6, 0.6,"Angsuran Bunga",0, 0, 'L');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(5, 0.6,"Rp. ".number_format($lihat['angsuran_bunga'], 2, ".", ","),0, 1, 'L');
    $pdf->Cell(6, 0.6,"",0, 0, 'L');
    $pdf->Cell(1, 0.6,"",0, 0, 'C');
    $pdf->Cell(5, 0.6,"________________ +",0, 1, 'L');
    $pdf->Cell(6, 0.6,"Total Angsuran",0, 0, 'R');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(5, 0.6, "Rp. ".number_format($bayar, 2, ".", ","),0, 1, 'L');
    $pdf->Cell(10, 0.6,"Sisa Pinjaman",0, 0, 'R');
    $pdf->Cell(1, 0.6,":",0, 0, 'C');
    $pdf->Cell(5, 0.6, "Rp. ".number_format($lihat['total_tunggakan'], 2, ".", ","),0, 1, 'L');
    $pdf->Cell(20,0.5,"------------------------------------------------------------------------------------------------------------------------------------------------",0,1,'L');
    $pdf->SetFont('Times','i',8);
    $pdf->Cell(20.5,0.7,"Denpasar, ".date("D-d/m/Y"),0,1,'L');

    $pdf->SetMargins(2,1,2);

    $pdf->SetFont('Times','',10);
    $pdf->SetX(3);            
    $pdf->Cell(10,2,"Yang Bertanda Tangan,",0,'L');
    $pdf->SetX(15);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(10,2,"Denpasar, ".date("d/m/Y"),0,'R');
    $pdf->SetFont('Times','',10);
    $pdf->SetX(3);            
    $pdf->Cell(10,8,$konten,0,'L');
    $pdf->SetX(16);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(10,8,$lihat1['nama_nasabah'],0,'R');
    
$pdf->Output();
?>