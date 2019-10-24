<?php

if (!empty($router)) {
    $router->define([
        '' => 'src/controllers/index.php',
        'login' => 'src/controllers/login.php',
        'logout' => 'src/controllers/logout.php',
        'register' => 'src/controllers/register.php',
        'orderreview' => 'src/controllers/order_review.php',
        'orderreviewpdf' => 'src/controllers/order_review_pdf.php',
        'winkelmand' => 'src/controllers/cart.php',

        'admin/product' => 'src/controllers/admin_product.php',
        'admin/gebruiker' => 'src/controllers/admin_user.php',
        'forgotpass' => 'src/controllers/forgotpass.php',
        'newpass' => 'src/Controllers/newpass.php'

    ]);
}
