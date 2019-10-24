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
<<<<<<< HEAD
        'newpass' => 'src/Controllers/newpass.php',
=======
        'newpass' => 'src/Controllers/newpass.php'


>>>>>>> 5288dfef84c5adca04d6be7d561da66b2d878517
    ]);
}
