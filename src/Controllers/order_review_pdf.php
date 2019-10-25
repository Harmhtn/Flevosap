<?php
require('vendor/fpdf/fpdf/original/fpdf.php');

class PDF extends FPDF
{

    //page header
    public function Header()
    {
        //logo
        $this->Image('src/Resources/public/images/logo-header.png', 15, 8, 40);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Orderoverzicht Flevosap', 0, 0, 'C');
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
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
//content for the pdf
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Product ID', '1');
$pdf->Cell(35, 10, 'Naam', '1');
$pdf->Cell(25, 10, 'Aantal', '1');
$pdf->Cell(35, 10, 'Prijs', '1');
$pdf->Cell(35, 10, 'Totaal', '1');
$pdf->Ln(11);
//for every cart item make a result
foreach ($_SESSION['cart_item'] as $result) {
    $pdf->Cell(30, 5, $result['id'], '1');
    $pdf->Cell(35, 5, $result['name'], '1');
    $pdf->Cell(25, 5, $result['quantity'], '1');
    $pdf->Cell(35, 5, $result['price'], '1');
    $pdf->Cell(35, 5, ($result['quantity']*$result['price']), '1');
    $pdf->Ln(6);
}

$pdf->Cell(300, 5, '_________________________________________________________________', '0', 'C');
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Totaal bedrag exclusief btw');
$pdf->Ln(6);
//totaal bedrag uitrekenen
$carts = $_SESSION['cart_item'];
$cart_amount = count($carts);
$totalPrice = 0;
foreach ($carts as $cart) {
    $totalPrice += $cart['quantity'] * $cart['price'];
}
$totalPriceExBtw = $totalPrice * 0.9;
$pdf->Cell(35, 5, $totalPriceExBtw);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Totaal bedrag inclusief btw');
$pdf->Ln(6);
$pdf->Cell(35, 5, $totalPrice);
$shippingCosts = 0;
if($totalPriceInBtw < 20) {
    $shippingCosts = 5;
}
$pdf->Ln(6);
$pdf->Cell(35, 5, $shippingCosts);

$pdf->Ln(15);
//bezorgadres afbeelden
$pdf->Cell(35, 5, 'Het bezorgadres is:');
$pdf->Ln(6);
$table = 'orders';
//haal het order id op inplaats van $userId
$userdId = $_SESSION['user_id'];

//haal gegevens uit db met order id
$user_data = $app['database']->selectUserOrderAddress($table, $userdId);

//put a delivery adress on the pdf when userdata isnt empty
if (!empty($user_data)) {
    foreach ($user_data as $r) {
        $pdf->Cell(35, 5, $r['delivery_address']);
    }
}



$pdf->Output();
