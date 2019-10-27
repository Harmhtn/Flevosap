<?php
//check if action is empty
if (!empty($_GET['action'])) {
    //check what action isset
    switch ($_GET['action']) {
        case 'remove':
            //check if id isset and use it in the getProduct method
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $picture = $app['database']->getProduct($id);
                //get the file path/name
                $filename = "src/Resources/public/images/imageupload/" . $picture[0]['product_image'];
                //look if the file exists and if it does delete it
                if (file_exists($filename)) {
                    unlink($filename);
                }
                //remove the item from the database
                $product = $app['database']->removeItem($id);
                //go back to product page
                header('Location:/admin/product');
            }

            break;
        case 'add':
            //check if post add isset
            if (isset($_POST['add'])) {
                //get the needed info from the picture
                $file = $_FILES['image'];

                $fileName = $_FILES['image']['name'];
                $fileTmpName = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $fileError = $_FILES['image']['error'];
                $fileType = $_FILES['image']['type'];

                //get the file type
                $fileExtTmp = explode('.', $fileName);
                $fileExt = strtolower(end($fileExtTmp));

                $allowed = array('jpg', 'jpeg', 'png', 'JPG','JPEG','PNG');

                //check if the extention is in the allowed types, if the file has no errors and if the file is smaller than 20 mb
                if (in_array($fileExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 20000) {

                            //make a new random name with the extention and move the file to the right location
                             $fileNameNew = uniqid('', true) . '.' . $fileExt;
                             $fileDestination = 'src/Resources/public/images/imageupload/' . $fileNameNew;
                             move_uploaded_file($fileTmpName, $fileDestination);
                             $_SESSION['picture'] = $fileNameNew;
                             $productById = $app['database']->createProduct();
                        } else {
                            // if the picture is to big
                            $error = "The picture is to big";
                         }
                                } else {
                                    $error = "Er is een fout opgetreden." . $fileError;
                                }
                            } else {
                                $error = "Dit type bestand is niet toegestaan.";
                            }
                        }
                        header('Location:/admin/product');
                        break;
                    }



}

$table = 'product';
$allProduct = $app['database']->selectAll($table);

if ($_SESSION['user_type'] != 3) {
    header('Location:/');
}
//load head and navbar
                require 'Resources/views/head.php';

//load view
                require 'Resources/views/default/admin_product.view.php';

//load footer
                require 'Resources/views/footer.php';
