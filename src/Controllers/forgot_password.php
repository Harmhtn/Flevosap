<?php

//load head and navbar
require 'Resources/views/head.php';

//check if the email_send post isset
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

        //credentials for email account
        $host = "smtp.gmail.com";
        $username = "team3wind@gmail.com";
        $password = "flevosap";
        $port = '465';

        //subject and reciever
        $from = 'Taalproof';
        $to = $user_info['customer_email'];
        $subject = "Wachtwoord veranderen";

        //the body for the email
        $body = "je hebt recent aangevraagt om uw wachtwoord te veranderen. 
                Klik op de volgende link om uw wachtwoord opnieuw in te stellen 
                http://localhost:8000/forgot_password?token={$token}";
        //make headers array
        $headers = array('From' => $from,
            'To' => $to,
            'Subject' => $subject);
        //make mail
        $smtp = Mail::factory('smtp',
            array('host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password));

        //try to send the mail
        try {
            $mail = $smtp->send($to, $headers, $body);

        } catch (PEAR_Exception $e) {
            //if there is an error make $error
            $error = "Er kon geen mail verstuurd worden";
        }
        $error =  "Er is een mail verstuurd naar het email adress controlleer ook uw spam box";

    } else {
        //if the email doesnt exist make this error
        $error =  "Dit email adress staat niet geregistreerd";
    }


}
//check if token isset
elseif (isset($_GET['token'])) {
    //check if the result isnt empty
    $result = $app['database']->checkToken($_GET['token']);
    if ($result != ''){

        //get date now and check if more then ten minutes past
        $date = date("Y-m-d H:i:s");
        $authentication_date = $result['authentication_date'];
        $authentication_date = new DateTime($authentication_date);
        $new_date = $authentication_date->modify('+10 minutes');

        //check if the date format is correct and execute resetToken method
        if ($date <= $new_date->format('Y-m-d H:i:s') ) {

            require 'Resources/views/default/newpass.view.php';


            $app['database']->resetToken($_GET['token'], $result['customer_id']);
        }
    }else{
        //if checktoken is empty set an error with expired token
        $error = "Authenticatie token is Helaas verlopen";
        require 'Resources/views/default/forgot_password.view.php';
    }

}
//if newpass isset hash it and update it with the method updatePassword
elseif (isset($_GET['newpass'])) {
    $new_password = hash('sha256', $_POST['new_password']);

    $app['database']->updatePassword($new_password, $_GET['newpass']);

    //go back to login after newpassword is created
    header('Location: /login');
}
else {

//load view
    require 'Resources/views/default/forgot_password.view.php';
}


//load footer
require 'Resources/views/footer.php';