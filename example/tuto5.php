<?php
require('../inc/LetterSignature.php');

$pdf = new LetterSignature();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

// Signature 1
$pdf->Signature();

// Signature 2
$pdf->AddPage('L', 'A4');
$pdf->Signature(2);

// Signature 3
$pdf->AddPage('P', 'A4');
$pdf->Signature(3);

// Signature 4
$pdf->AddPage('L', 'A4');
$pdf->Signature(4);

$pdf->Output();
?>
