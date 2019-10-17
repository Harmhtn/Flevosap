<?php

//See if an action is specified
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        //add product to cart
        case "add":


        //check if q
        if (!empty($_POST["quantity"])) {
            $id = $_GET['id'];
            $productById = $app['database']->getProduct($id);
            $itemArray = array($productById[0]["product_name"]=>array('id'=>$productById[0]["product_id"], 'name'=>$productById[0]["product_name"], 'quantity'=>$_POST["quantity"], 'price'=>$productById[0]["product_price"], 'image'=>$productById[0]["product_image"]));

            if (!empty($_SESSION["cart_item"])) {
                if (in_array($productById[0]["product_name"], array_keys($_SESSION["cart_item"]))) {
                    foreach ($_SESSION["cart_item"] as $current => $value) {
                        if ($productById[0]["product_name"] == $current) {
                            if (empty($_SESSION["cart_item"][$current]["quantity"])) {
                                $_SESSION["cart_item"][$current]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$current]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        break;

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


if (!empty($_SESSION['cart_item'])) {
    $totalPrice = 0;
    foreach ($_SESSION["cart_item"] as $item) {
        $totalPrice += $item["quantity"] * $item["price"];
        $_SESSION['btw'] = $totalPrice/ 100 * 9;
    }
    $_SESSION['total_price'] = $totalPrice;
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
