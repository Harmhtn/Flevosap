<?php

declare(strict_types=1);
$flevo = $app['database'];

require 'Resources/views/head.php';
// Als er gepost word krijg je een passwordtoken mee om je password te resetten
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['password-token'])) {
        $passwordToken = $_GET['password-token'];
        pwdReset($passwordToken);
    }
} else {
    require 'Resources/views/default/newpass.view.php';
}
