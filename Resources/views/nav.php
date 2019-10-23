<link rel="stylesheet" href="src/Resources/public/css/navbarstyle.css">

<div class="container d-flex flex-md-row align-items-center bg-white">
    <nav class="navbar navbar-light bg-light bg-white">
        <a class="my-0 mr-md-auto" href=""><img style="max-height: 120px;" class="" src="src/Resources/public/images/logo-nav.png" alt=""></a>
        <a class="p-2 text-dark" href="#">Boomgaard</a>
        <a class="p-2 text-dark" href="#">In de fles</a>
        <a class="p-2 text-dark" href="/">Webshop</a>
        <a class="p-2 text-dark" href="#">Hmmm</a>
        <a class="p-2 text-dark" href="#">Sappen</a>
        <a class="p-2 text-dark" href="#">Horeca</a>
        <a class="p-2 text-dark" href="#">Nieuws</a>
        <a class="p-2 text-dark" href="#">Contact</a>
        <a class="p-2 text-dark" href="logout">Logout</a>
        <?php

        if ($_SESSION[''] == 3){
            echo '<a class="p-2 text-dark" href="admin">Admin</a>';
        } ?>
    </nav>
    <a class="fas fa-shopping-cart" href="winkelmand"></a>
</div>
<hr>