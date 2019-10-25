<?php
$table = 'product';
$products = null;

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];

    $all_products = $app['database']->selectAll($table);
    if ($sort === 'alphabetical') {
        $products = $app['database']->orderByName($table);
    } elseif ($sort === 'price-high') {
        $products = $app['database']->orderByPriceHigh($table);
    } elseif ($sort === 'price-low') {
        $products = $app['database']->orderByPriceLow($table);
    }
}

if ($products === null) {
    $products = $app['database']->selectAll($table);
}

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'add') {
        //check if q
        if (!empty($_POST["quantity"])) {
            $id = $_GET['id'];
            $productById = $app['database']->getProduct($id);
            $itemArray = array($productById[0]["product_name"] => array(
                'id' => $productById[0]["product_id"],
                'name' => $productById[0]["product_name"],
                'quantity' => $_POST["quantity"],
                'price' => $productById[0]["product_price"],
                'image' => $productById[0]["product_image"]));


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
    }
    header('Location:/');
}

//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/index.view.php';

//load footer
require 'Resources/views/footer.php';
