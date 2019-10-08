<?php

if (!empty($router)) {
    $router->define( [

        '' => 'src/controllers/index.php',
        'login' => 'src/controllers/login.php',
        'register' => 'src/controllers/register.php',
        'orderreview' => 'src/controllers/order_review.php',
        'shoppingcart' => 'src/controllers/shoppingcart.php'

    ]);
}