<?php
//Als logout word geklikt zal de session worden gesloten
if ($_SERVER['REQUEST_URI'] == '/logout') {
    session_destroy();
}

$flevo = $app['database'];

//load head and navbar
//require 'Resources/views/head.php';
require 'Resources/views/head.php';

//Als er wordt gepost zal de gebruiker worden ingelogd met zijn gegevens
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $new_password = hash('sha256', $pass);
    $user = $flevo->login($email, $new_password);
    $block = $app['database']->checkBlock($email, $new_password);

    // als de user is geblokkeerd kan hij niet inloggen
    if ($block[0][0] == 4) {
        echo 'Dit account is geblokkeerd';
    } else {
        if ($block[0][0] == 4) {
            $error = 'Dit account is geblokkeerd';
        } else {
            foreach ($user as $use) {
                $_SESSION["user_id"] = $use["customer_id"];
            }

            //Provide the user with a login session.
            $_SESSION['user_type'] = $user['customer_type_customer_type_id'];
            $_SESSION["logged_in"] = true;
            header('Location: /');
        }
    }

}
//load view
require 'Resources/views/default/login.view.php';


//load footer
require 'Resources/views/footer.php';
