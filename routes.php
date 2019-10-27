<?php

if (!empty($router)) {

    $router->define([

        '' => 'src/Controllers/index.php',
        'flevosap_2.0/index.php/login' => 'src/Controllers/login.php',
        'logout' => 'src/Controllers/login.php',
        'register' => 'src/Controllers/register.php',
        'orderreview' => 'src/Controllers/order_review.php',
        'orderreviewpdf' => 'src/Controllers/order_review_pdf.php',
        'winkelmand' => 'src/Controllers/cart.php',
        'admin' => 'src/Controllers/admin.php',
        'business' => 'src/Controllers/business.php',
        'admin/product' => 'src/Controllers/admin_product.php',
        'admin/gebruiker' => 'src/Controllers/admin_user.php',
        'flevosap_2.0/index.php/forgot_password' => 'src/Controllers/forgot_password.php'
    ]);
}
