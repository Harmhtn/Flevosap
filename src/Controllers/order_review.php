<?php
//require head and nav
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
    $succesMessage = "Gelukt! De order is geplaatst, bekijk hier de pdf <a href='orderreviewpdf'>versie</a>";
    $failMessage = "Error! De order is niet geplaatst";
    $success = '';
    if (empty($_SESSION['cart_item'])) {
        echo 'Je hebt nog geen items in je winkelmand';
        die;
    }
    $customerId = $_SESSION['user_id'];


    //check if post newaddress isset and is isnt empty
    if (isset($_POST['newAddress']) && !empty($_POST['newAddress'])) {
        //set newaddres
        $newAddress = $_POST['newAddress'];
    } else {
        //get the useraddress if newAddress isnt set or if it is empty
        $userId = $_SESSION['user_id'];
        $userData = $app['database']->selectUserAddress('customers', $userdId);
        $newAddress = $userData[0]['customer_address'];
    }

    //set date and set a description
    $orderDate = new DateTime();
    $orderDateConverted = $orderDate->format('Y-m-d H:i:s');
    $orderNote = 'Hier is een omschrijving';
    $orderStatusId = 12345;
//    $paymentMethodId = $paymentMethod[$_POST['select_payment_method']];
    $paymentMethodId = 0;


    $success = $flevo->placeOrder($newAddress, $customerId, $paymentMethodId, $orderDateConverted, $orderNote);

}
    //make a var from cart item session and count the amount of items also set totalprice exbtw 0
    $carts = $_SESSION['cart_item'];
    $cart_amount = count($carts);
    $totalPriceExBtw = 0;



    //loop through the cart items and make a total price set it to to decimals
    foreach ($carts as $cart) {
        $totalPriceExBtw += $cart['quantity'] * $cart['price'];
        $totalPriceExBtw = number_format($totalPriceExBtw, 2);
    }


    //create price including btw
    $totalPriceInBtw = number_format($totalPriceExBtw * 1.1, 2);

    //set shipping costs
    $shippingCosts = 0;
    if ($totalPriceInBtw < 20) {
        $shippingCosts = 5;
    }

require 'Resources/views/default/order_review.view.php';
