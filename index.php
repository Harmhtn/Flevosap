<?php

require 'src/bootstrap.php';
session_start();

if (isset($_SESSION['logged_in']) != true) {

    $str = $_GET['url'];
    $request_uri = substr($str, 0, strrpos($str, '?'));

    if ($_GET['url'] == 'register' ||
        $_GET['url'] == 'login' ||
        $_GET['url'] == 'forgot_password') {

        require Router::load('routes.php')
            ->direct(Request::uri());
    } else {

        $_GET['url'] = 'login';

        require Router::load('routes.php')
            ->direct(Request::uri());
    }
} elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 3) {
    if ($_GET['url'] == 'admin' ||
        $_GET['url'] == 'admin/product' ||
        $_GET['url'] == 'admin/gebruiker') {
        $_GET['url'] = 'home';
    }

    require Router::load('routes.php')
        ->direct(Request::uri());
} else {
    require Router::load('routes.php')
        ->direct(Request::uri());
}
