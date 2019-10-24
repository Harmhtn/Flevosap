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



    //inloggen om te checken of de gebruiker al bestaat
    if ($flevo->login($mail, $pass)) {
        echo "Er bestaat al een account met deze email";
        echo '<a href="login">, keer terug naar loginscherm</a>';
    } elseif (count(array_filter($_POST))!=count($_POST)) {
        echo 'Vul alle velden in';
        die;
    } else {
        // functie aanroepen om gebruiker te maken
        $error = $flevo->register($username, $mail, $pass, $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date);

       // if ($error) {
//            echo "Gelukt! Het account is aangemaakt";
//            header('login');
//        }
//        else{
//            echo "er is een fout opgetreden";
//        }
    }
} else {
    require 'Resources/views/default/register.view.php';
}

//load footer
require 'Resources/views/footer.php';
