<?php
//logica boven
require 'Resources/views/head.php';

$flevo = $app['database'];
$table = 'customers';
$userdId = $_SESSION['user_id'];
$user_data = $app['database']->selectUserAddress($table, $userdId);
$succesMessage ="Gelukt! De order is geplaatst, bekijk hier de pdf <a href='orderreviewpdf'>versie</a>";
$failMessage = "Error! De order is niet geplaatst";
$success = '';
if (empty($_SESSION['cart_item'])) {
    echo 'Je hebt nog geen items in je winkelmand';
    die;
}

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


$carts = $_SESSION['cart_item'];
$cart_amount = count($carts);
$totalPriceExBtw = 0;
foreach ($carts as $cart) {
    $totalPriceExBtw += $cart['quantity'] * $cart['price'];
    $totalPriceExBtw = number_format($totalPriceExBtw, 2);
}

$totalPriceInBtw = number_format($totalPriceExBtw * 1.1, 2);

$shippingCosts = 0;
if ($totalPriceInBtw < 20) {
    $shippingCosts = 5;
}


require 'Resources/views/default/order_review.view.php';
