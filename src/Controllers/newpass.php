<?php
//?
declare(strict_types=1);
$flevo = $app['database'];

require 'Resources/views/head.php';

//chech if the request method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //if the password-token get isset get the password token and use the pwdReset function
    if (isset($_GET['password-token'])) {
        $passwordToken = $_GET['password-token'];
        pwdReset($passwordToken);
    }
} else {
    //if the request method is not post require the newpass view
    require 'Resources/views/default/newpass.view.php';
}
