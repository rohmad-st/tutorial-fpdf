<?php
require('../inc/FooterClass.php');

$pdf = new FooterClass();
$pdf->AddPage('P', 'A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetMargins(20, 10);
$pdf->Cell(0, 4, 'Portrait Halaman ke ' . $pdf->page);

for ($i = 0; $i < 4; $i ++) {
    $pdf->AddPage('P', 'A4');
    $pdf->Cell(0, 4, 'Portrait Halaman ke ' . $pdf->page);
}

for ($i = 0; $i < 4; $i ++) {
    $pdf->AddPage('L', 'A4');
    $pdf->Cell(0, 4, 'Landscape Halaman ke ' . $pdf->page);
}

$pdf->Output();
?>
