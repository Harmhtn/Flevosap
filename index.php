<?php

require 'src/bootstrap.php';

session_start();

if (isset($_SESSION['logged_in']) != true) {

    $str = $_SERVER['REQUEST_URI'];
    $request_uri = substr($str, 0, strrpos($str, '?'));

    if ($_SERVER['REQUEST_URI'] == '/register' ||
        $_SERVER['REQUEST_URI'] == '/login' ||
        $_SERVER['REQUEST_URI'] == '/forgot_password' ||
        $request_uri == '/forgot_password') {

        require Router::load('routes.php')
            ->direct(Request::uri());
    } else {

        $_SERVER['REQUEST_URI'] = 'login';

        require Router::load('routes.php')
            ->direct(Request::uri());
    }
} elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 3) {
    if ($_SERVER['REQUEST_URI'] == '/admin' ||
        $_SERVER['REQUEST_URI'] == '/admin/product' ||
        $_SERVER['REQUEST_URI'] == '/admin/gebruiker') {
        $_SERVER['REQUEST_URI'] = '/';
    }

    require Router::load('routes.php')
        ->direct(Request::uri());
} else {
    require Router::load('routes.php')
        ->direct(Request::uri());
}
