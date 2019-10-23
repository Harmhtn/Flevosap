<?php

if (!empty($_GET['action'])){
    if (!empty($_GET['id'])) {
        switch ($_GET['action'])
         {
            case 'Blokkeren':
                $id = $_GET['id'];
                $blockCustomer = $app['database']->blockUser($id);
            break;

            case 'De-blokkeren':
                $id = $_GET['id'];
                $blockCustomer = $app['database']->deBlockUser($id);
        }
    }
}

$table = 'customers';
$allCustomers = $app['database']->selectAll($table);

if ($_SESSION[''] != 3) {
    header('Location:/');
}
//load head and navbar

require 'Resources/views/head.php';

//load view
require 'Resources/views/default/admin_user.view.php';

//load footer
require 'Resources/views/footer.php';
