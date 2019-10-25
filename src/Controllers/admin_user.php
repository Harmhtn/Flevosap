<?php

//check if action and id are not empty
if (!empty($_GET['action'])){
    if (!empty($_GET['id'])) {
        //check what action is set and execute the right one
        switch ($_GET['action'])
         {
            case 'Blokkeren':
                //get the id and execute the blockUser method
                $id = $_GET['id'];
                $blockCustomer = $app['database']->blockUser($id);
                $error = $app['database']->blockUser($id);

            break;

            case 'De-blokkeren':
                //get the id and execute the blockUser method
                $id = $_GET['id'];
                $blockCustomer = $app['database']->deBlockUser($id);
        }
    }
}

$table = 'customers';
$allCustomers = $app['database']->selectAll($table);

if ($_SESSION['user_type'] != 3) {
    header('Location:/');
}
//load head and navbar

require 'Resources/views/head.php';

//load view
require 'Resources/views/default/admin_user.view.php';

//load footer
require 'Resources/views/footer.php';
