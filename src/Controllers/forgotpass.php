<?php

declare(strict_types=1);

require 'Resources/views/head.php';

require_once 'src/Services/MailService.php';

// 1. Je vragen mail
// 2. Secret genereren (1231208easdlj12ol3j1o23)
// 3. Store secret in database. (password_forgot_requests table). (ID, SECRET, DATE_CREATED, DATE_USED)
// 4. Je stuurt mail -> /password-reset/response?secret=1231208easdlj12ol3j1o23
// 5. Password_forgot_request uit db halen, DATE_USED checken nog niet gezet is (moet NULL zijn) + DATE_CREATED niet ouder dan uur. 1 van 3 fout = redirect met error
// 6. Geef form voor nieuw password
// 7. Set DATE_USED en change password in DB.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));
    $message = '
        <html>
    <head>
    <title>Wachtwoord resetten Flevosap</title>
    </head>
    <body>
    <p>Klik op de link hieronder om je nieuwe wachtwoord in te stellen</p><br>
    <a href="http://localhost:9999/newpass?password-token=$token">Reset wachtwoord</a>
    
    </body>
    </html>
    ';

    $mailer = new MailService();
    $mailSuccess = $mailer->sendMail($email, 'Wachtwoord reset Flevosap', $message);

    if ($mailSuccess) {
        echo 'De mail is verstuurd.';
    } else {
        echo 'De mail kon niet goed worden verstuurd, probeer het later opnieuw.';
    }
} else {
    //load view
    require 'Resources/views/default/forgotpass.view.php';
}
