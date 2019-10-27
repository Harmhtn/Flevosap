<?php
//check if action and id are not empty
if (!empty($_GET['action'])){
    if (!empty($_GET['id'])) {
        //check what action is set
        switch ($_GET['action'])
         {
            case 'Blokkeren':
                //block the user with the blockUser method
                $id = $_GET['id'];
                $blockCustomer = $app['database']->blockUser($id);
            break;

            case 'De-blokkeren':
                //de-block user with the deBlockUser method
                $id = $_GET['id'];
                $blockCustomer = $app['database']->deBlockUser($id);
        }
    }
}

//get data from database with allcustomers
$table = 'customers';
$allCustomers = $app['database']->selectAll($table);

//check if user has permission
if ($_SESSION['user_type'] != 3) {
    header('Location:/');
}
//load head and navbar

require 'Resources/views/head.php';

//load view
require 'Resources/views/default/admin_user.view.php';

//load footer
require 'Resources/views/footer.php';
