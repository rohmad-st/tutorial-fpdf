<?php
require('../inc/LetterHead.php');
require('../inc/GlobalFunction.php');

// global funtion
$func = new GlobalFunction();

// Start FPDF
$pdf = new LetterHead('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(15, 10);

// start generae letter head (kop surat)
$pdf->SetWidths(159); // width of box in out text
$pdf->AddLetterHeadFontSize(['10', '12', '10', '10', '10']); //default font size=10
$pdf->AddLetterHeadFontStyle(['B', 'B', '', '', '']); //default font type normal
$pdf->AddLetterHead(['DOKUMEN RINCIAN KEGIATAN', 'ANGGARAN PENDAPATAN DAN BELANJA DESA TAHUN 2015', '(DRK)', 'PEMERINTAH DESA AMBON MANISE KABUPATEN KOTA AMBON', 'Tahun Anggaran 2015']);

// Detail bottom (after kop surat)
$pdf->SetWidths([30, 34, 120]); // width of column
$pdf->AddLetterHeadDetail(['Organisasi', ' : 81.71.01.2001', 'PEMERINTAH NEGERI']);
$pdf->AddLetterHeadDetail(['Kecamatan', ' : 71.01', 'NUSANIWE']);
$pdf->AddLetterHeadDetail(['Negeri', ' : 2001', 'LATUHALAT']);

$pdf->SetWidths([30, 154]);
$pdf->AddLetterHeadDetail(['Sumber Dana', ' : Pelaksanaan Desa']);

// PAGE 2 with right info
$pdf->AddPage();
$pdf->SetMargins(15, 10);
$pdf->SetWidths(132); // width of box in out text
$pdf->AddLetterHeadFontSize(['10', '12', '12', '10', '10']); //default font size=10
$pdf->AddLetterHeadFontStyle(['B', 'B', '', '', '']); //default font type normal
$pdf->AddLetterHead(['DOKUMEN RINCIAN KEGIATAN', 'ANGGARAN PENDAPATAN DAN BELANJA DESA TAHUN 2015', '(DRK)', 'PEMERINTAH DESA AMBON MANISE KABUPATEN KOTA AMBON', 'Tahun Anggaran 2015'], '', "DRK\nDESA", 25);

// Detail bottom (after kop surat)
$pdf->SetWidths([30, 32, 120]); // width of column
$pdf->AddLetterHeadDetail(['Organisasi', ' : 81.71.01.2001', 'PEMERINTAH NEGERI']);
$pdf->AddLetterHeadDetail(['Kecamatan', ' : 71.01', 'NUSANIWE']);
$pdf->AddLetterHeadDetail(['Negeri', ' : 2001', 'LATUHALAT']);

$pdf->Output();

?>
