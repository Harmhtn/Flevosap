<?php

//See if an action is specified
if (!empty($_GET["action"])) {
    //use the action that is specified
    switch ($_GET["action"]) {
        //add product to cart

        case "remove":
            //if the session cart_item isnt empty make a current loop with the cart items
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $current => $value) {
                    //if the id equals the current id unset the current cart item
                    if ($_GET["id"] == $current) {
                        unset($_SESSION["cart_item"][$current]);
                    }
                    //if the session cart item is empty unset it
                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                }
            }
        break;

        case "empty":
            //if the action is empty then unset the session cart item
            unset($_SESSION["cart_item"]);
        break;


    }
    //go back to winkelmand and get rid of the get
    header('Location:winkelmand');
}
//verzendkosten
$shippingCosts = 5;
//check if session cart item is not empty
if (!empty($_SESSION['cart_item'])) {
    //set total price 0 if session is not empty
    $totalPrice = 0;

    //loop through the cart items and do the total price + quantity times price
    foreach ($_SESSION["cart_item"] as $item) {
        $totalPrice += $item["quantity"] * $item["price"];
        //btw equals 9% of total price
        $_SESSION['btw'] = $totalPrice/ 100 * 9;
    }
    //make totalPrice a session
    $_SESSION['total_price'] = $totalPrice;
    //if the totalPrice is equal or higher than 20 shippingcosts is 0
    if ($totalPrice >= 20) {
        $shippingCosts = 0;
    }
} else {
    //if the session cartitem is empty total price ant btw both = 0
    $_SESSION['total_price'] = 0;
    $_SESSION['btw'] = 0;
}


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/cart.view.php';

//load footer
require 'Resources/views/footer.php';
