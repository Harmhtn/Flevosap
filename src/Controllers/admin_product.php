
<?php

if(!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case "remove":

            if (isset($_GET['id']))
            {
                $id = $_GET['id'];
                $productById = $app['database']->removeItem($id);
            }

            break;
        case "add":
            if (isset($_POST['add']))
            {

                $file = $_FILES['image'];

                $fileName = $_FILES['image']['name'];
                $fileTmpName = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $fileError = $_FILES['image']['error'];
                $fileType = $_FILES['image']['type'];

                $fileExtTmp = explode('.', $fileName);
                $fileExt = strtolower(end($fileExtTmp));

                $allowed = array('jpg', 'jpeg', 'png', 'PGN', 'JPG', 'JPEG');

                if(in_array($fileExt, $allowed))
                {
                    if($fileError === 0)
                    {
                        if($fileSize > 20000){
                            $fileNameNew = uniqid('', true) . '.' . $fileExt;
                            $fileDestination = 'src/Resources/public/images/imageupload/' . $fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $_SESSION['picture'] = $fileNameNew;
                            $productById = $app['database']->createProduct();
                        }
                        else
                        {
                            echo "The picture is to big";

                        }
                    }
                    else
                    {
                        echo "Er is een fout opgetreden.". $fileError;
                    }
                }
                else
                {
                    echo "Dit type bestand is niet toegestaan.";
                }
            }

            break;
    }
}
$table = 'product';
$allProduct = $app['database']->selectAll($table);
$table1 = 'customers';
$allCustomers = $app['database']->selectAll($table1);

if ($_SESSION['user_type'] != 3) {
    header('Location:/');
}
//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/admin_product.view.php';

//load footer
require 'Resources/views/footer.php';


