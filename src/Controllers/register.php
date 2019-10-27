<?php

//load head and navbar
require 'Resources/views/head.php';

//get the cities
$flevo = $app['database'];
$cities = $flevo->getCities();


//check if the post isset
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //all $_POST values for registering

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



    //hash the password for safety
    $new_password = hash('sha256', $pass);

    //inloggen om te checken of de gebruiker al bestaat
    if ($flevo->login($mail, $new_password)) {
        $already_exists = true;

    } else {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $flevo->register($username, $mail, $new_password, $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date);
            require 'Resources/views/default/login.view.php';
        }
        else
        {
            $error = 'De mail is niet correct';
            require 'Resources/views/default/register.view.php';
        }
        // functie aanroepen om gebruiker te maken
    }
}else{
    require 'Resources/views/default/register.view.php';

}



//load footer
require 'Resources/views/footer.php';
