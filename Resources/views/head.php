<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flevosap</title>
    </head>
<body>

<?php
// als sessie is enabled maar er bestaat er 1
// && niet als sessie is enabled maar er bestaat niks
// && als session logged in je er
if (session_status() == PHP_SESSION_ACTIVE && session_status() != PHP_SESSION_NONE && isset($_SESSION['logged_in'])) {
    require "Resources/views/nav.php";
}
?>


