<?php
require('../inc/ImprovedTable.php');
require('../inc/GlobalFunction.php');

// global funtion
$func = new GlobalFunction();

// Start FPDF
$pdf = new ImprovedTable('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// menggunakan column. default: false
$pdf->show_cols = true;

// Column Definite
$cols = [
    "No."    => 23,
    "Uraian" => 78,
    "Jumlah" => 22,
    "Kode"   => 26,
    "Jenis"  => 30,
    "Ket"    => 11
];
$pdf->addCols($cols);

// Align Column
$align = [
    "No."    => "C",
    "Uraian" => "L",
    "Jumlah" => "C",
    "Kode"   => "R",
    "Jenis"  => "R",
    "Ket"    => "C"
];
$pdf->addLineFormat($align);

// Row
$pdf->SetFont('Arial', '', 12);
$y = $pdf->GetY() + 8; // if using column
$line = [
    "No."    => "1",
    "Uraian" => $func->GenerateSentence(),
    "Jumlah" => "1",
    "Kode"   => "600.00",
    "Jenis"  => "600.00",
    "Ket"    => "1"
];
$size = $pdf->addLine($y, $line);
$y += $size + 2;
$line = [
    "No."    => "2",
    "Uraian" => $func->GenerateSentence(),
    "Jumlah" => "1",
    "Kode"   => "600.00",
    "Jenis"  => "600.00",
    "Ket"    => "1"
];
$size = $pdf->addLine($y, $line);
$y += $size + 2;

/*
 * Tanpa column
 * */

$pdf->AddPage();
$pdf->show_cols = false;
$pdf->SetFont('Arial', '', 10);

// Column Definite
$pdf->addCols([23, 78, 22, 26, 30, 11]);

// Align Column
$pdf->addLineFormat(['C', 'L', 'C', 'R', 'R', 'C']);

// Row
$y2 = $pdf->GetY();
$size = $pdf->addLine($y2, ["1", $func->GenerateSentence(), "1", "600.00", "600.00", "1"]);
$y2 += $size + 2;

$pdf->addLine($y2, ["2", $func->GenerateSentence(), "1", "700.00", "700.00", "4"]);
$y2 += $size + 2;

$pdf->Output();

?>
