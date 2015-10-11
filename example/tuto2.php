<?php
require('../inc/WrapTable.php');

$pdf = new WrapTable('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Set lebar kolom
$pdf->SetWidths([20, 70, 50, 30]);

// Set perataan kolom
$pdf->SetAligns(['C', 'C', 'C', 'C']);

// kolom
$pdf->Row(['No.', 'Uraian', 'Jumlah', 'Ket']);

// baris
$pdf->SetAligns(['C', 'L', 'R', 'L']);
$pdf->SetFont('Arial', '', 12);
for ($i = 1; $i < 10; $i ++) {
    $pdf->Row([$i, $pdf->GenerateSentence(), $i * rand(1, 100), $pdf->GenerateWord()]);
}

$pdf->Output();

?>
