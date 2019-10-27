<?php
//logica boven
require 'Resources/views/head.php';
// de variabelen die er nodig zijn
$flevo = $app['database'];
$table = 'customers';
$userdId = $_SESSION['user_id'];
$user_data = $app['database']->selectUserAddress($table, $userdId);
$succesMessage ="Gelukt! De order is geplaatst, bekijk hier de pdf <a href='orderreviewpdf'>versie</a>";
$failMessage = "Error! De order is niet geplaatst";
$success = '';
//als er niets is geplaats in de winkelmand, laat de orderreview niet zien
if (empty($_SESSION['cart_item'])) {
    echo 'Je hebt nog geen items in je winkelmand';
    die;
}
//De order plaatsen in de database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerId = $_SESSION['user_id'];

    if (isset($_POST['newAddress']) && !empty($_POST['newAddress'])) {
        $newAddress = $_POST['newAddress'];
    } else {
        $userId = $_SESSION['user_id'];
        $userData = $app['database']->selectUserAddress('customers', $userdId);
        $newAddress = $userData[0]['customer_address'];
    }

    $orderDate = new DateTime();
    $orderDateConverted = $orderDate->format('Y-m-d H:i:s');
    $orderNote = 'Hier is een omschrijving';
    $orderStatusId = 12345;
//    $paymentMethodId = $paymentMethod[$_POST['select_payment_method']];
    $paymentMethodId = 0;


    //in db plaatsen
    $success = $flevo->placeOrder($newAddress, $customerId, $paymentMethodId, $orderDateConverted, $orderNote);

}

//prijs berekenen en correct laten zien met number_format
$carts = $_SESSION['cart_item'];
$cart_amount = count($carts);
$totalPriceExBtw = 0;
foreach ($carts as $cart) {
    $totalPriceExBtw += $cart['quantity'] * $cart['price'];
    $totalPriceExBtw = number_format($totalPriceExBtw, 2);
}

$totalPriceInBtw = number_format($totalPriceExBtw * 1.1, 2);

//Als de prijs lager is dan 20 euro zijn de verzendkost 5 euro, zo niet zijn ze 0
$shippingCosts = 0;
if ($totalPriceInBtw < 20) {
    $shippingCosts = 5;
}


require 'Resources/views/default/order_review.view.php';
