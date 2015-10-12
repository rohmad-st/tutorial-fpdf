<?php

class GlobalFunction
{
    var $kertas = 'A4'; // jenis kertas
    var $kertas_pjg = 297; // portrait
    var $kertas_lbr = 210; // landscape
    /**
     * Generate kalimat
     *
     * @return string
     */
    public function GenerateSentence()
    {
        //Get a random sentence
        $nb = rand(1, 10);
        $s = '';
        for ($i = 1; $i <= $nb; $i ++)
            $s .= $this->GenerateWord() . ' ';

        return substr($s, 0, - 1);
    }

    /**
     * Generate kata
     *
     * @return string
     */
    public function GenerateWord()
    {
        //Get a random word
        $nb = rand(3, 10);
        $w = '';
        for ($i = 1; $i <= $nb; $i ++)
            $w .= chr(rand(ord('a'), ord('z')));

        return $w;
    }
}