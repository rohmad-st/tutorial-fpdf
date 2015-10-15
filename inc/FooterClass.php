<?php
require('../lib/fpdf.php');

class FooterClass extends FPDF
{
    var $default_font_size = 9;
    var $padding_column    = 5;
    var $is_footer         = true;
    var $is_cover          = false;

    function Footer()
    {
        $printed_by = '../inc/printed-by-simdes.png';

        // siapkan variabel
        $right_margin = empty($this->right_margin) ? 12 : $this->right_margin; //default 12
        $left = $this->lMargin;
        $orientation = $this->CurOrientation;
        $x_optional = 0;

        if ($orientation == 'L' || $orientation == 'l') {
            $right_margin = 14;
            $x_optional = 0;
        }

        $width = $this->w - ($left + $right_margin);
        $w_cell = $width / 2;           // width of cell
        $x_img = $width + $x_optional;  // x position image printed
        $y_img = $this->h - 10;         // y position image printed

        // generate footer hanya jika dibutuhkan
        if ($this->is_footer == true) {

            // tanpa cover
            if ($this->is_cover == false) {
                $this->SetFont('Arial', 'B', $this->default_font_size);
                $this->SetXY($left, - 17);
                $this->Cell($w_cell, $this->padding_column, $this->title, 'TLB', 0, 'L');
                $this->Cell($w_cell, $this->padding_column, ' Halaman ' . $this->PageNo() . ' dari {nb}', 'TRB', 0, 'R');
                $this->Image($printed_by, $x_img, $y_img, 20);

            } else { // dengan cover
                // skip untuk halaman utama
                if ($this->PageNo() != 1) {
                    $this->SetFont('Arial', 'B', $this->default_font_size);
                    $this->SetXY($left, - 17);
                    $this->Cell($w_cell, $this->padding_column, $this->title, 'TLB', 0, 'L');
                    $this->Cell($w_cell, $this->padding_column, ' Halaman ' . $this->PageNo() . ' dari {nb}', 'TRB', 0, 'R');
                    $this->Image($printed_by, $x_img, $y_img, 20);
                }
            }
        }
    }
}