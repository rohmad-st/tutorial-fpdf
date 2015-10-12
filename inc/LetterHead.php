<?php
require('../lib/fpdf.php');

class LetterHead extends FPDF
{
    // variabel menentukan proses ke
    var $numproc = 1;

    function addLetterHead($x, $y, $width, $row, array $data)
    {
        $x = $x + 30;
        $height = $row * 8;

        // box image
        if ($this->numproc == 1) {
            $curx = $this->GetX();
            $cury = $this->GetY();
            $this->Image("http://placehold.it/100x129.jpg", $curx + 3, $cury + 1, 30 - 6, $height - 2);
            $this->Rect($curx, $cury, 30, $height);
        }

        // box letter head
        $this->Rect($x, $y, $width, $height);

        for ($i = 0; $i < count($data); $i ++) {
            $this->SetXY($x, $y);
            $this->MultiCell($width, 5, $data[$i], 0, 'C');
            $y += 5;
        }

        $this->numproc ++;
    }

    function addLH(array $data)
    {
//        $r1 = $this->GetX();
//        $r2 = $this->w - ($r1 * 2);
//        $y1 = $this->GetY() ;
//        $y2 = $this->heights - 50 - $y1;
//
//        $this->SetXY($r1, $y1);
//        $this->Rect($r1, $y1, $r2, $y2, "D");

//        // jumlah array
        $length = count($data);
        $x = $this->GetX();
        $y = $this->GetY();

        $width_sum = 0;
        for ($i = 0; $i < $length; $i ++) {
            $width_sum += $this->widths[$i];
        }

        $this->Rect($x, $y, $width_sum, 30, 'D');
//
        for ($i = 0; $i < $length; $i ++) {
            $width = $this->widths[$i];
            $this->Cell($width, 4, $data[$i], 0, 0, 'C');
            $x += $width;
        }
//
        $this->Ln(4);
    }

}