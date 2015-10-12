<?php
require('../lib/fpdf.php');

class LetterHead extends FPDF
{
    var $widths;

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
     * Add Letter Head (Kop Surat) exactly in top page
     *
     * @param array $data
     * @param null  $file
     */
    function AddLetterHead(array $data, $file = null)
    {
        $length = count($data); // length data
        $column = ($this->FontSizePt / 2) - 1; // height of row

        $x = $this->lMargin; // set x position exactly on left margin
        $y = $this->tMargin; // set y position exactly on top margin
        $w = $this->widths; // width column
        $h = ($length * $column) + 4; // height box

        $this->Rect($x, $y, $w + 25, $h); // box in out of text

        // check if image is valid as image type
        if (exif_imagetype($file) == false) {
            $file = '../inc/logo.png';
        }

        $this->Image($file, $x + 5, $y + 1, 0, $h - 2); // image of head letter

        // text in letter head
        $this->SetY($y + 2);
        for ($i = 0; $i < $length; $i ++) {
            $this->SetX($x + 25);
            $this->Cell($w, $column, $data[$i], 0, 0, 'C');
            $this->Ln($column);
        }
    }

}