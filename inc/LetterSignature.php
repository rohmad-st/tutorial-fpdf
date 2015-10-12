<?php
//require('../lib/fpdf.php');
require('WrapTable.php');
require('GlobalFunction.php');

class LetterSignature extends WrapTable
{
    var $default_font_size = 9;
    var $padding_column    = 5;

    /**
     * Signature for bottom place
     *
     * @param int    $jenis
     * @param int    $height_of_cell
     * @param string $orientation
     */
    function Signature($jenis = 1, $height_of_cell = 40, $orientation = 'P')
    {
        // Definite size of Paper
        $size = new GlobalFunction();

        switch ($jenis) {
            case 2: // landscape final
                $bottom_margin = 40;
                $space_bottom = $size->kertas_lbr - ($this->GetY() + $bottom_margin); // space left on page
                if ($height_of_cell > $space_bottom) {
                    $this->AddPage();
                    $this->Ttd2();

                } else {
                    $this->Ttd2();
                }
                break;

            case 3: // portrait rancangan
                $bottom_margin = 105;
                $space_bottom = $size->kertas_pjg - ($this->GetY() + $bottom_margin); // space left on page
                if ($height_of_cell > $space_bottom) {
                    $this->AddPage();
                    $this->Ttd3();

                } else {
                    $this->Ttd3();
                }
                break;

            case 4: // landscape rancangan
                $bottom_margin = 129;
                $space_bottom = $size->kertas_lbr - ($this->GetY() + $bottom_margin); // space left on page
                if ($height_of_cell > $space_bottom) {
                    $this->AddPage();
                    $this->Ttd4();

                } else {
                    $this->Ttd4();
                }
                break;

            default: // portrait final
                $bottom_margin = 10;
                $space_bottom = $size->kertas_pjg - ($this->GetY() + $bottom_margin); // space left on page
                if ($height_of_cell > $space_bottom) {
                    $this->AddPage();
                    $this->Ttd($orientation);

                } else {
                    $this->Ttd($orientation);
                }
                break;
        }
    }

    function Ttd($orientation)
    {
        switch (strtoupper($orientation)) {
            case 'L':
                $this->Ln(8);
                $this->SetFont('Arial', '', $this->default_font_size);
                $this->Cell(180);
                $this->Cell(85, 4, 'Jenggolo, 12 Oktober 2015', 0, 0, 'C');
                $this->Ln();
                $this->SetFont('Arial', 'B', $this->default_font_size);
                $this->Cell(180);
                $this->MultiCell(85, 6, "Kepala Desa Jenggolo,\n\n\n\nRohmat Sasmito", 0, 'C');
                break;

            default:
                $this->Ln(8);
                $this->SetFont('Arial', '', $this->default_font_size);
                $this->Cell(85);
                $this->Cell(85, 4, 'Jenggolo, 12 Oktober 2015', 0, 0, 'C');
                $this->Ln();
                $this->SetFont('Arial', 'B', $this->default_font_size);
                $this->Cell(85);
                $this->MultiCell(85, 6, "Kepala Desa Jenggolo,\n\n\n\nRohmat Sasmito", 0, 'C');
                break;
        }
    }

    function Ttd2()
    {
        $this->Ln(10);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->Cell(156);
        $this->Cell(114, 10, 'Jenggolo, 12 Oktober 2015', 0, 0, 'C');
        $this->Ln(0.1);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->Cell(156, 4, 'Pelaksanaan Anggaran Per Tri Wulan', 1, 0);
        $this->MultiCell(114, 6, "\nKepala Desa Jenggolo,\n\n\n\n\nRohmat Sasmito\n\n", 1, 'C');
        $this->Ln(- 44);
        $this->SetWidths([39, 39, 39, 39]);
        $this->SetAligns(['C', 'C', 'C', 'C']);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->Row(['Tri Wulan I', 'Tri Wulan II', 'Tri Wulan III', 'Tri Wulan IV']);
        $this->SetAligns(['R', 'R', 'R', 'R']);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->Row([10, 70, 50, 40]);

        $this->Ln(0.1);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->Cell(156, 4, 'Pelaksanaan Anggaran Per Bulan', 1, 0);

        $this->Ln(4);
        $this->SetAligns(['L', 'R', 'L', 'R']);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->Row(['Januari', 100, 'Juli', 200]);
        $this->Row(['Februari', 100, 'Agustus', 200]);
        $this->Row(['Maret', 100, 'September', 200]);
        $this->Row(['April', 100, 'Oktober', 200]);
        $this->Row(['Mei', 100, 'November', 200]);
        $this->Row(['Juni', 100, 'Desember', 200]);
    }

    function Ttd3()
    {
        // Pembahasan rancangan dokumen rincian kegiatan APBDesa
        $this->Ln(4);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->MultiCell(170, $this->padding_column, 'PEMBAHASAN RANCANGAN DOKUMEN RINCIAN KEGIATAN DESA', 1, 'L');
        $this->Ln(0.1);
        $this->Cell(85);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->Cell(85, 4, 'Jenggolo, 12 Oktober 2015', 0, 0, 'C');
        $this->Ln(0.1);
        $this->SetWidths([85, 85]);
        $this->SetAligns(['L', 'C']);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->Row(["Tanggal Pembahasan\nCatatan Hasil Pembahasan", "\nKOORDINATOR PTPKD,\n\n\n\nFahmi Alfareza"]);

        // Dibahas dan disetujui oleh
        $this->Ln(4);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->MultiCell(170, $this->padding_column, 'DIBAHAS DAN DISETUJUI OLEH:', 1, 'L');
        $this->SetWidths([15, 70, 45, 40]);
        $this->SetAligns(['C', 'C', 'C', 'C']);
        $this->Row(['No.', 'Nama Lengkap', 'Jabatan', 'Tanda Tangan']);
        $this->SetAligns(['L', 'L', 'L', 'L']);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->Row(['', '', "Sekretaris\n\n", '']);
        $this->Row(['', '', "Ketua BPD\n\n", '']);

        // Tim asistensi dan evaluasi pemerintah daerah
        $this->Ln(4);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->MultiCell(170, $this->padding_column, 'TIM ASISTENSI DAN EVALUASI PEMERINTAH DAERAH', 1, 'L');
        $this->SetWidths([15, 70, 45, 40]);
        $this->SetAligns(['C', 'C', 'C', 'C']);
        $this->Row(['No.', 'Nama/NIP', 'Jabatan', 'Tanda Tangan']);
        $this->SetAligns(['L', 'L', 'L', 'L']);
        $this->Row(["\n\n", '', '', '']);
        $this->Row(["\n\n", '', '', '']);
        $this->Row(["\n\n", '', '', '']);
        $this->Row(["\n\n", '', '', '']);
    }

    function Ttd4()
    {
        // Pembahasan rancangan dokumen rincian kegiatan APBDesa
        $this->Ln(4);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->MultiCell(270, $this->padding_column, 'PEMBAHASAN RANCANGAN DOKUMEN RINCIAN KEGIATAN DESA', 1, 'L');
        $this->Ln(0.1);
        $this->Cell(155);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->Cell(115, 6, 'Jenggolo, 12 Oktober 2015', 0, 0, 'C');
        $this->Ln(0.1);
        $this->SetWidths([155, 115]);
        $this->SetAligns(['L', 'C']);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->Row(["Tanggal Pembahasan\nCatatan Hasil Pembahasan", "\nKOORDINATOR PTPKD,\n\n\n\nFahmi Alfareza"]);

        // Dibahas dan disetujui oleh
        $this->Ln(4);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->MultiCell(270, $this->padding_column, 'DIBAHAS DAN DISETUJUI OLEH:', 1, 'L');
        $this->SetWidths([30, 100, 70, 70]);
        $this->SetAligns(['C', 'C', 'C', 'C']);
        $this->Row(['No.', 'Nama Lengkap', 'Jabatan', 'Tanda Tangan']);
        $this->SetFont('Arial', '', $this->default_font_size);
        $this->SetAligns(['L', 'L', 'L', 'L']);
        $this->Row(['', '', "Sekretaris\n\n", '']);
        $this->Row(['', '', "Ketua BPD\n\n", '']);

        // Rekomendasi tim asistensi dan evaluasi pemerintah daerah
        $this->Ln(4);
        $this->SetFont('Arial', 'B', $this->default_font_size);
        $this->MultiCell(270, 4.2, 'REKOMENDASI TIM ASISTENSI DAN EVALUASI PEMERINTAH DAERAH', 1, 'L');
        $this->MultiCell(270, 4.2, "\nTanggal:\nIsi Rekomendasi\n\n\n\n", 1, 'L');

        // Tim asistensi dan evaluasi pemerintah daerah
        $this->Ln(4);
        $this->MultiCell(270, $this->padding_column, 'TIM ASISTENSI DAN EVALUASI PEMERINTAH DAERAH', 1, 'L');
        $this->SetWidths([30, 100, 70, 70]);
        $this->SetAligns(['C', 'C', 'C', 'C']);
        $this->Row(['No.', 'Nama Lengkap', 'Jabatan', 'Tanda Tangan']);
        $this->SetAligns(['L', 'L', 'L', 'L']);
        $this->Row(["\n\n", '', '', '']);
        $this->Row(["\n\n", '', '', '']);
        $this->Row(["\n\n", '', '', '']);
    }
}