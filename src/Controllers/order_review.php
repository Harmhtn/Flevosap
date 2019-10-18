<?php
//logica boven
require 'Resources/views/head.php';

$table = 'customers';
$userdId = $_SESSION['user_id'];
$user_data = $app['database']->selectUserAddress($table, $userdId);

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    //alle $_POST values
//    $newAddress = $_POST['newAddress'];
//    $paymentMethod = $_POST[''];
//}

require 'Resources/views/default/order_review.view.php';


