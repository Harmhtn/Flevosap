<?php
//if the request uri equals /logout destroy session
if ($_SERVER['REQUEST_URI'] == '/logout') {
    session_destroy();
}


$flevo = $app['database'];

//load head and navbar
//require 'Resources/views/head.php';
require 'Resources/views/head.php';


//if the request method equals post then get the the user posted values email and password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    //hash the password and set the functions login and checkBlock

    $new_password = hash('sha256', $pass);
    $user = $flevo->login($email, $new_password);
    $block = $app['database']->checkBlock($email, $new_password);


    // als de user is geblokkeerd kan hij niet inloggen


    if (!empty($block) && $block[0][0] == 4) {
        $error = 'Dit account is geblokkeerd';
    } else {
        if (empty($user)) {
            $error = 'Dit is een fout email of wachtwoord';

        } else {

            //if the user is not blocked make a loop and make  sessions for the user id , the user type and logged in
            foreach ($user as $use) {
                $_SESSION['user_id'] = $use['customer_id'];
                $_SESSION['user_type'] = $use['customer_type_customer_type_id'];
            }

            //Provide the user with a login session.
            $_SESSION["logged_in"] = true;

            //return to index.php
            header('Location: /');
        }

    }
}
//load view
require 'Resources/views/default/login.view.php';


//load footer
require 'Resources/views/footer.php';
