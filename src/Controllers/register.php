<?php

//load head and navbar
require 'Resources/views/head.php';

$flevo = $app['database'];
$cities = $flevo->getCities();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //alle $_POST values
    $username = $_POST['customer_name'];
    $mail = $_POST['customer_email'];
    $pass = $_POST['customer_password'];
    $zipcode = $_POST['customer_zipcode'];
    $phone = $_POST['customer_phone'];
    $address = $_POST['customer_address'];
    $city_id = $_POST['select_city'];
    $payment_method = 1;
    $customer_type = $_POST['MyRadio'];
    $last_updated = new DateTime();
    $last_updated_date = $last_updated->format('Y-m-d H:i:s');



    $new_password = hash('sha256', $pass);
    //inloggen om te checken of de gebruiker al bestaat
    if ($flevo->login($mail, $new_password)) {
        $already_exists = true;

    } else {
        // functie aanroepen om gebruiker te maken

        $error = $flevo->register($username, $mail, $pass, $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date);


        $flevo->register($username, $mail, $pass, $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date);
        header('Location: /login');

    }
} else {
    require 'Resources/views/default/register.view.php';
}

//load footer
require 'Resources/views/footer.php';
