<?php
//set table and products for methods
$table = 'product';
$products = null;

//check if the sort is set
if (isset($_GET['sort'])) {
    //get the sort type
    $sort = $_GET['sort'];

    //check what sort type is specified and use the right method for the sort that was selected
    $all_products = $app['database']->selectAll($table);
    if ($sort === 'alphabetical') {
        $products = $app['database']->orderByName($table);
    } elseif ($sort === 'price-high') {
        $products = $app['database']->orderByPriceHigh($table);
    } elseif ($sort === 'price-low') {
        $products = $app['database']->orderByPriceLow($table);
    }
}

//if products is null select all the products
if ($products === null) {
    $products = $app['database']->selectAll($table);
}

//see if an action is specified
if (!empty($_GET['action'])) {
    //see if the action is add
    if ($_GET['action'] == 'add') {
        //check if quantity is not empty
        if (!empty($_POST["quantity"])) {
            //get the id and execute getProduct with the id
            $id = $_GET['id'];
            $productById = $app['database']->getProduct($id);

            //make an array with the item details
            $itemArray = array($productById[0]["product_name"] => array(
                'id' => $productById[0]["product_id"],
                'name' => $productById[0]["product_name"],
                'quantity' => $_POST["quantity"],
                'price' => $productById[0]["product_price"],
                'image' => $productById[0]["product_image"]));

            //check if the cart item session is empty and look if the product is already in the cart item session
            if (!empty($_SESSION["cart_item"])) {
                if (in_array($productById[0]["product_name"], array_keys($_SESSION["cart_item"]))) {
                    //loop cart item as current
                    foreach ($_SESSION["cart_item"] as $current => $value) {
                        //if the product id from product by id equals current
                        if ($productById[0]["product_name"] == $current) {
                            //check if the quantity of the current cart item is empty if it is empty set quantity to 0
                            if (empty($_SESSION["cart_item"][$current]["quantity"])) {
                                $_SESSION["cart_item"][$current]["quantity"] = 0;
                            }
                            //session cart item quantity equals current quantity plus post quantity
                            $_SESSION["cart_item"][$current]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    // if the item is not in the cart merge the item array with the cart item session
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                // if cart item session the cart item session equals item array
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    }
    //go to the index page without the get
    header('Location:/');
}

//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/index.view.php';

//load footer
require 'Resources/views/footer.php';
