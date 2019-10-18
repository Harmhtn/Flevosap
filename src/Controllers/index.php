<?php

declare(strict_types=1);

$table = 'product';
$products = null;

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];

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


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/index.view.php';

//load footer
require 'Resources/views/footer.php';
