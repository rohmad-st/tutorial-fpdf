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

$pdf->Output();

?>
