<?php
require('../lib/fpdf.php');

class ImprovedTable extends FPDF
{
    var $show_cols = false;
    var $max_height;

    function addLineFormat($tab)
    {
        global $format, $column;

        while (list($lib, $pos) = each($column)) {
            if (isset($tab["$lib"]))
                $format[$lib] = $tab["$lib"];
        }
    }

    function addCols($tab)
    {
        global $column;

        $r1 = $this->GetX();
        $r2 = $this->w - ($r1 * 2);
        $y1 = $this->GetY();
        $y2 = $this->h - 50 - $y1;

        $mh = $this->max_height;
        if (isset($mh)) {
            $y2 = $mh;
        }

        $this->SetXY($r1, $y1);
        $this->Rect($r1, $y1, $r2, $y2, "D");

        if ($this->show_cols == true) {
            $this->Line($r1, $y1 + 6, $r1 + $r2, $y1 + 6);
        }

        $colX = $r1;
        $column = $tab;
        while (list($lib, $pos) = each($tab)) {
            if ($this->show_cols == false) {
                $lib = '';
            }

            $this->SetXY($colX, $y1 + 2);
            $this->Cell($pos, 1, $lib, 0, 0, "C");
            $colX += $pos;
            $this->Line($colX, $y1, $colX, $y1 + $y2);
        }
    }

    function addLine($row, $tab)
    {
        global $column, $format;

        $order = 10;
        $maxSize = $row;

        reset($column);
        while (list($lib, $pos) = each($column)) {
            $longCell = $pos - 2;
            $text = $tab[$lib];

            $formText = $format[$lib];
            $this->SetXY($order, $row - 1);
            $this->MultiCell($longCell, 4, $text, 0, $formText);
            if ($maxSize < ($this->GetY()))
                $maxSize = $this->GetY();
            $order += $pos;
        }

        return ($maxSize - $row);
    }
}