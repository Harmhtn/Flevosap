<?php

require('vendor/fpdf/fpdf/original/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Order overzicht');
$pdf->Output();
