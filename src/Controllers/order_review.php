<?php

require('vendor/fpdf/fpdf/original/fpdf.php');

class PDF extends FPDF
{

    // Page header
    public function Header()
    {
        // Logo
        $this->Image('src/Resources/public/images/logo-flevosap.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(65, 10, 'Orderoverzicht Flevosap', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    public function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class

$pdf = new PDF();
$order_array = $_SESSION["cart_item"];
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Cell(10, 10, print_r($order_array, true), 0, 0, 'L');
$pdf->Output();
