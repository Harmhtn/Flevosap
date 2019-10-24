<?php
if ($_SESSION['user_type'] != 3) {
    header('Location:/');
}
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/admin.view.php';

//load footer
require 'Resources/views/footer.php';