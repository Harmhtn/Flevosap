<?php

if (!empty($router)) {

    $router->define([

        'home' => 'src/Controllers/index.php',
        'login' => 'src/Controllers/login.php',
        'logout' => 'src/Controllers/login.php',
        'register' => 'src/Controllers/register.php',
        'orderreview' => 'src/Controllers/order_review.php',
        'orderreviewpdf' => 'src/Controllers/order_review_pdf.php',
        'winkelmand' => 'src/Controllers/cart.php',
        'admin' => 'src/Controllers/admin.php',
        'business' => 'src/Controllers/business.php',
        'admin/product' => 'src/Controllers/admin_product.php',
        'admin/gebruiker' => 'src/Controllers/admin_user.php',
        'forgot_password' => 'src/Controllers/forgot_password.php'
    ]);
}
