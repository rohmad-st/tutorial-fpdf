<?php
require('../lib/fpdf.php');

class LetterHead extends FPDF
{
    var $widths;
    var $font_style;
    var $font_size;

    /**
     * Definite width column
     *
     * @param $w
     */
    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths = $w;
    }

    /**
     * Definite Style each text in row
     *
     * @param $s
     */
    function AddLetterHeadFontSize($s)
    {
        //Set the array of font size
        $this->font_size = $s;
    }

    /**
     * Definite Style each text in row
     *
     * @param $s
     */
    function AddLetterHeadFontStyle($s)
    {
        //Set the array of font syle
        $this->font_style = $s;
    }

    /**
     * Add Letter Head (Kop Surat) exactly in top page
     *
     * @param array $data
     * @param null  $file
     */
    function AddLetterHead(array $data, $file = null)
    {
        $f_family = isset($this->FontFamily) ? 'Arial' : $this->FontFamily; // font family
        $length = count($data); // length data

        // get sum of font size
        $fz = $this->font_size;
        $tot_font_size = empty($fz) ? 10 * $length : 0;
        for ($i = 0; $i < count($fz); $i ++) {
            $tot_font_size += $fz[$i];
        }

        $x = $this->lMargin; // set x position exactly on left margin
        $y = $this->tMargin; // set y position exactly on top margin
        $w = $this->widths; // width column
        $h = ($tot_font_size / 2) - 1; // height box

        $this->Rect($x, $y, $w + 25, $h); // box in out of text

        // check if image is valid as image type
        if (exif_imagetype($file) == false) {
            $file = '../inc/logo.png';
        }

        $this->Image($file, $x + 5, $y + 1, 0, $h - 2); // image of head letter

        // text in letter head
        $this->SetY($y + 2);

        for ($i = 0; $i < $length; $i ++) {
            $f_size = empty($this->font_size) ? '10' : $this->font_size[$i]; // font size
            $f_style = empty($this->font_style) ? $this->FontStyle : $this->font_style[$i]; // font style
            $h_cell = ($f_size / 2) - 1; // height cell

            $this->SetX($x + 25);
            $this->SetFont($f_family, $f_style, $f_size);
            $this->Cell($w, $h_cell, $data[$i], 0, 0, 'C');
            $this->Ln($h_cell);
        }
    }

    function AddLetterHeadDetail(array $data)
    {
        $this->Ln(2);
        $length = count($data);

        for ($i = 0; $i < $length; $i ++) {
            if ($i == 0) {

                $this->Cell($this->widths[$i], 5, $data[$i], 'LB', 0, 'L');
            } elseif ($i == $length - 1) {
                $this->Cell($this->widths[$i], 5, $data[$i], 'RB', 0, 'L');

            } else {
                $this->Cell($this->widths[$i], 5, $data[$i], 'B', 0, 'L');
            }

        }
        $this->Ln(3);
    }

}