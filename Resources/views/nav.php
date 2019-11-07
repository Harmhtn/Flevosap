<!-- navbar -->
<link rel="stylesheet" href="src/Resources/public/css/navbarstyle.css">

<div class="container d-flex flex-md-row align-items-center bg-white">
    <nav class="navbar navbar-light bg-light bg-white">

        <a class="my-0 mr-md-auto ml-2" href="?url=home"><img style="max-height: 120px;" class=""  src="src/Resources/public/images/logo-nav.png" alt=""></a>
        <a class="p-2 text-dark ml-2" href="#">Boomgaard</a>
        <a class="p-2 text-dark ml-2" href="#">In de fles</a>
        <a class="p-2 text-dark ml-2" href="#">Hmmm</a>
        <a class="p-2 text-dark ml-2" href="?url=home">Sappen</a>
        <a class="p-2 text-dark ml-2" href="#">Horeca</a>
        <a class="p-2 text-dark ml-2" href="#">Nieuws</a>
        <a class="p-2 text-dark ml-2" href="#">Contact</a>
        <a class="p-2 text-dark ml-2" href="?url=logout">Logout</a>
        <?php
        // if admin show a admin link

        if ($_SESSION['user_type'] == 3) {
            echo '<a class="p-2 text-dark ml-2" href="?url=admin">Admin</a>';
        } ?>
        <?php
        if ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 3) {
            echo '<a class="p-2 text-dark ml-2" href="?url=business">Zakelijk</a>';
        } ?>
        <a class="fas fa-shopping-cart p-2" href="?url=winkelmand"></a>
    </nav>

</div>
<hr>