<?php
//set table for method
$table = 'product';
$products = null;

//check if sort is set and make it a variable
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];

    //check what sorting is set and sort the page with the selected method
    $all_products_business = $app['database']->selectAllWhere($table, 'product_type', '1');
    if ($sort === 'alphabetical') {
        $products = $app['database']->orderByNameWhere();
    } elseif ($sort === 'price-high') {
        $products = $app['database']->orderByPriceHighWhere();
    } elseif ($sort === 'price-low') {
        $products = $app['database']->orderByPriceLowWhere();
    }
}

//if no sorting select do normal sorting
if ($products === null) {
    $all_products_business = $app['database']->selectAllWhere($table, 'product_type', '1');
}

//check if an action is set then check if it is add
if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'add') {
        //check if quantity is not empty and get the id
        if (!empty($_POST["quantity"])) {
            $id = $_GET['id'];
             //get the product with the set id and make an array with the returned values
            $productById = $app['database']->getProduct($id);
            $itemArray = array($productById[0]["product_name"] => array(
                'id' => $productById[0]["product_id"],
                'name' => $productById[0]["product_name"],
                'quantity' => $_POST["quantity"],
                'price' => $productById[0]["product_price"],
                'image' => $productById[0]["product_image"]));

            //check if the session cart item is not empty
            if (!empty($_SESSION["cart_item"])) {
                //check if the product is already in the cart
                if (in_array($productById[0]["product_name"], array_keys($_SESSION["cart_item"]))) {
                    //loop all cart items
                    foreach ($_SESSION["cart_item"] as $current => $value) {
                        //check if the current cart item == ad product name of the added item
                        if ($productById[0]["product_name"] == $current) {
                            //check if quantity is empty if it is set it to 0
                            if (empty($_SESSION["cart_item"][$current]["quantity"])) {
                                $_SESSION["cart_item"][$current]["quantity"] = 0;
                            }
                            //current quantity equals current + posted quantity
                            $_SESSION["cart_item"][$current]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    //if the item is not yet in the cart merge the 2 arrays
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                //if the cart is empty set the array to session cart item
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    }
    //go back to index without the get values
    header('Location:/');
}

//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/business.view.php';

//load footer
require 'Resources/views/footer.php';
