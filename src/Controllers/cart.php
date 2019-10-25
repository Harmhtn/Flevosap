<?php

//See if an action is specified
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        //add product to cart

        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $current => $value) {
                    if ($_GET["id"] == $current) {
                        unset($_SESSION["cart_item"][$current]);
                    }

                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                }
            }
        break;

        case "empty":
            unset($_SESSION["cart_item"]);
        break;


    }
    //change link
    header('Location:winkelmand');
}
//verzendkosten
$shippingCosts = 5;
if (!empty($_SESSION['cart_item'])) {
    $totalPrice = 0;

    foreach ($_SESSION["cart_item"] as $item) {
        $totalPrice += $item["quantity"] * $item["price"];
        $_SESSION['btw'] = $totalPrice/ 100 * 9;
    }
    $_SESSION['total_price'] = $totalPrice;
    if ($totalPrice >= 20) {
        $shippingCosts = 0;
    }
} else {
    $_SESSION['total_price'] = 0;
    $_SESSION['btw'] = 0;
}


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/cart.view.php';

//load footer
require 'Resources/views/footer.php';
