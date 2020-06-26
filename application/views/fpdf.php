<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/06/2020
 * Time: 23:17
 */
class RPDF extends FPDF
{
// Page header
    function Header()
    {

        // Arial bold 15
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 20);

        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Payment Receipt', 0, 0, 'C');
        // Line break
        $this->Ln(20);


    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$this->Pdf = new RPDF();
$this->Pdf->AliasNbPages();
$this->Pdf->AddPage();

$this->Pdf->SetFont('Arial', 'B', 13);
$this->Pdf->Cell(20, 7, 'No', 1, 0, 'C');
$this->Pdf->Cell(120, 7, 'Description', 1, 0);
$this->Pdf->Cell(55, 7, 'Amount', 1, 1, 'R');


$backtraces = [['no' => '1', 'at_description' => 'asdasda zscsad asdasd asdasd asdasd asdasd asdasd asd dasd asdasdsad asdasdasdasdasdasd asdasdasda sd', 'at_transaction_amount' => 100]];
$count = 0;
foreach ($backtraces as $backtace) {
    $this->Pdf->SetFont('Arial', '', 13);
    $width = 120;
    $height = 7;

    if ($this->Pdf->GetStringWidth($backtace['at_description']) < $width) {
        $line = 1;
    } else {
        $textLength = strlen($backtace['at_description']);
        $errMargin = 10;
        $startChar = 0;
        $maxChar = 0;
        $textArray = array();
        $tmpString = '';

        while ($startChar < $textLength) {
            while ($this->Pdf->GetStringWidth($tmpString) < ($width - $errMargin) && ($startChar + $maxChar) < $textLength) {
                $maxChar++;
                $tmpString = substr($backtace['at_description'], $startChar, $maxChar);
            }

            $startChar = $startChar + $maxChar;
            array_push($textArray, $tmpString);

            $maxChar = 0;
            $tmpString = '';
        }

        $line = count($textArray);

    }

    $this->Pdf->Cell(20, ($line * $height), $count + 1, 1, 0, 'C');

    $xPos = $this->Pdf->GetX();
    $yPos = $this->Pdf->GetY();


    $this->Pdf->MultiCell($width, $height, $backtace['at_description'], 1);
    $this->Pdf->SetXY($xPos + $width, $yPos);

    $amount = '$' . number_format($backtace['at_transaction_amount'], 2);
    $this->Pdf->Cell(55, ($line * $height), $amount, 1, 1, 'R');


    $count++;
}


$this->Pdf->Output();