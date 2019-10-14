<?php
//load head and navbar
require 'Resources/views/head.php';
require 'Resources/views/nav.php';
require 'Resources/views/default/forgotpass.view.php';
require_once 'flevosap_2.0/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];


    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
        ->setUsername('harmhtn@gmail.com')
        ->setPassword('Zsdr1hhtn1996')
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['harmhtn@gmail.com' => 'HarmH'])
        ->setTo([$email, 'other@domain.org' => 'A name'])
        ->setBody('Here is the message itself')
    ;

// Send the message
    $result = $mailer->send($message);


    //bevestiging dat het verstuurd is
    echo "De mail is verstuurd";

}else{
    //load view
    require 'Resources/views/default/forgotpass.view.php';
}





