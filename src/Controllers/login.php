<?php
$flevo = $app['database'];

//load head and navbar
//require 'Resources/views/head.php';
require 'Resources/views/head.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $user = $flevo->login($email, $pass);
    $block = $app['database']->checkBlock($email, $pass);



    if (!$user) {
        echo "Geen account bekend met deze gegevens!";
    } else {
        foreach ($user as $use) {
            $_SESSION["user_id"] = $use["customer_id"];
        }
        //Provide the user with a login session.
        $_SESSION["logged_in"] = true;
        echo "Je bent ingelogd";
    }
} else {
    //load view
    if ($block[0][0] == 4) {
        echo 'Dit account is geblokkeerd';
    } else {

        if (!$user) {
            echo "Geen account bekend met deze gegevens!";
        } else {
            foreach ($user as $use) {
                $_SESSION["user_id"] = $use["customer_id"];
                $_SESSION["user_type"] = $use["customer_type_customer_type_id"];
            }
            //Provide the user with a login session.

            $_SESSION["logged_in"] = true;
            echo "Je bent ingelogd";
        }
    }
}
//load view

    require 'Resources/views/default/login.view.php';




//load footer
require 'Resources/views/footer.php';
