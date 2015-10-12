<?php
require('../inc/LetterHead.php');
require('../inc/GlobalFunction.php');

// global funtion
$func = new GlobalFunction();

// Start FPDF
$pdf = new LetterHead('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(15, 10);

$pdf->SetFont('arial', 'B', 10);

// width of box in out text
$pdf->SetWidths(159);
$pdf->AddLetterHead(['DOKUMEN RINCIAN KEGIATAN', 'ANGGARAN PENDAPATAN DAN BELANJA DESA TAHUN 2015', 'DRK', 'PEMERINTAH DESA AMBON MANISE KABUPATEN KOTA AMBON']);

$pdf->Output();

?>
