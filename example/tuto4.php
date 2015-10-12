<?php
require('../inc/LetterHead.php');
require('../inc/GlobalFunction.php');

// global funtion
$func = new GlobalFunction();

// Start FPDF
$pdf = new LetterHead('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(15, 10);
$pdf->SetFont('Arial', '', 12);

// variabel
$x = $pdf->GetX();

$img = $pdf->Image('../inc/logo.png', $x + 10, 11, 0, 20);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell($x - 5);
$pdf->Cell(18, 22, $img, 'TLB', 0, 'C');
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(128, 10, 'DOKUMEN RINCIAN KEGIATAN', 'TR', 0, 'C');
$pdf->Cell(24, 10, '', 'TR', 0, 'C');
$pdf->Ln(4);
$pdf->Cell(18);
$pdf->Cell(128, 10, 'ANGGARAN PENDAPATAN DAN BELANJA DESA TAHUN 2015', 0, 0, 'C');
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(24, 10, 'DRK', 'R', 0, 'C');
$pdf->Ln(4);
$pdf->Cell(18);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(128, 10, '(DRK)', 'R', 0, 'C');
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(24, 10, 'DESA', 'R', 0, 'C');
$pdf->Ln(4);
$pdf->Cell(18);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(128, 10, 'PEMERINTAH DESA AMBON MANISE KABUPATEN KOTA AMBON', 'BR', 0, 'C');
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(24, 10, '', 'RB', 0, 'C');

// Organisasi
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 5, 'Organisasi', 'LB', 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, ' : 81.71.01.81', 'B', 0, 'L');
$pdf->Cell(110, 5, 'PEMERINTAH DESA', 'RB', 0, 'L');

// Kecamatan
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 5, 'Kecamatan', 'LB', 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, ' : 71.01', 'B', 0, 'L');
$pdf->Cell(110, 5, 'NUSA NIWE', 'RB', 0, 'L');

// Desa
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 5, 'Desa', 'LB', 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, ' :  81.71.01.2000', 'B', 0, 'L');
$pdf->Cell(110, 5, 'AMBON MANISE', 'RB', 0, 'L');

$pdf->Output();

?>
