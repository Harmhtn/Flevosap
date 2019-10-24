<?php

//load head and navbar
require 'Resources/views/head.php';


if (isset($_POST['email_send'])) {

    //check if email exists in db
    $email_login = $_POST['email'];

    $user_info = $app['database']->selectIfEmailLoginExists($email_login);


    if ($user_info != Null) {

        //set token and send email with token
        $length = 40;
        $token = bin2hex(random_bytes($length));
        $app['database']->addToken($token, $user_info['customer_email']);

        require_once "vendor/pear/mail/Mail.php";

        $host = "smtp.gmail.com";
        $username = "team3wind@gmail.com";
        $password = "flevosap";
        $port = '465';

        $from = 'Taalproof';
        $to = $user_info['customer_email'];
        $subject = "Wachtwoord veranderen";

        $body = "je hebt recent aangevraagt om uw wachtwoord te veranderen. 
                Klik op de volgende link om uw wachtwoord opnieuw in te stellen 
                http://localhost:8000/forgot_password?token={$token}";
        $headers = array('From' => $from,
            'To' => $to,
            'Subject' => $subject);
        $smtp = Mail::factory('smtp',
            array('host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password));
        $smtp = Mail::factory('smtp',
            array('host' => $host,
                'auth' => true,
                'username' => $username,
                'password' => $password));

        try {
            $mail = $smtp->send($to, $headers, $body);

        } catch (PEAR_Exception $e) {
            $error = "Er kon geen mail verstuurd worden";
        }
        $error =  "Er is een mail verstuurd naar het email adress controlleer ook uw spam box";

    } else {
        $error =  "Dit email adress staat niet geregistreerd";
    }


}
elseif (isset($_GET['token'])) {
    $result = $app['database']->checkToken($_GET['token']);
    if ($result != ''){

        //get date now and check if more then ten minutes past
        $date = date("Y-m-d H:i:s");
        $authentication_date = $result['authentication_date'];
        $authentication_date = new DateTime($authentication_date);
        $new_date = $authentication_date->modify('+10 minutes');

        if ($date <= $new_date->format('Y-m-d H:i:s') ) {

            require 'Resources/views/default/newpass.view.php';
            $app['database']->resetToken($_GET['token'], $result['customer_id']);

            $app['database']->resetToken($_GET['token'], $result['customer_id']);
        }
    }else{
        $error = "Authenticatie token is Helaas verlopen";
        require 'Resources/views/default/forgot_password.view.php';
    }

}
elseif (isset($_GET['newpass'])) {
    $new_password = hash('sha256', $_POST['new_password']);

    $app['database']->updatePassword($new_password, $_GET['newpass']);

    header('Location: /login');
}
else {

//load view
    require 'Resources/views/default/forgot_password.view.php';
}


//load footer
require 'Resources/views/footer.php';