<?php
// if the get action is not empty go to switch
if (!empty($_GET['action'])) {
    //check what the action is and execute the right action with a switch
    switch ($_GET['action']) {
        case 'remove':
            //check if id isset
            if (isset($_GET['id'])) {
                //execute getProduct with id to get the info for the product
                $id = $_GET['id'];
                $picture = $app['database']->getProduct($id);
                $error = $app['database']->getProduct($id);

                //set the path and filename and check if it exists, if it exists delete the picture
                $filename = "src/Resources/public/images/imageupload/" . $picture[0]['product_image'];
                if (file_exists($filename)) {
                    unlink($filename);
                }

                //after the picure is deleted execute removeItem with the id of the product
                $product = $app['database']->removeItem($id);
                $error1 = $app['database']->removeItem($id);

                //go back to the admin product page without the get
                header('Location:/admin/product');
            }

            break;
        case "add":
            //check if post add isset
            if (isset($_POST['add'])) {
                // get all the file info that is needed for saving the picture
                $file = $_FILES['image'];

                $fileName = $_FILES['image']['name'];
                $fileTmpName = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $fileError = $_FILES['image']['error'];
                $fileType = $_FILES['image']['type'];

                //check the extention by getting the file name and exploding it at the dot also make the extention a variable
                $fileExtTmp = explode('.', $fileName);
                $fileExt = strtolower(end($fileExtTmp));
                // make an array with allowed types
                $allowed = array('jpg', 'jpeg', 'png','JPG','JPEG','PNG');
                            //check if the extention is in the allowed array and if there are no file errors and finnaly check if the file size is not above 20000 bytes
                            if (in_array($fileExt, $allowed)) {
                                if ($fileError === 0) {
                                    if ($fileSize < 20000) {
                                        //create a new random file name with the function uniqid and the fileExt
                                        $fileNameNew = uniqid('', true) . '.' . $fileExt;
                                        //define the file destination
                                        $fileDestination = 'src/Resources/public/images/imageupload/' . $fileNameNew;
                                        //place the picture in the right folder
                                        move_uploaded_file($fileTmpName, $fileDestination);
                                        //set a session for the createProduct function
                                        $_SESSION['picture'] = $fileNameNew;
                                        //execute create product
                                        $productById = $app['database']->createProduct();
                                        $error3 = $app['database']->createProduct();
                                    } else {
                                        //set session for to big file
                                        $_SESSION['errorcreate'] = 'The file is to big';
                                    }
                                } else {
                                    //set session for file error
                                    $_SESSION['errorcreate'] = "Er is een fout opgetreden." . $fileError;
                                }
                            } else {
                                //set session for invalid file type
                                $_SESSION['errorcreate'] = "Dit type bestand is niet toegestaan.";
                            }
                        }
                        //return to admin product page
                        header('Location:/admin/product');
                        break;
    }
}
//get all the products with var table and the selectAll method
$table = 'product';
$allProduct = $app['database']->selectAll($table);

// check if user is an admin if he is not go to index page
if ($_SESSION['user_type'] != 3) {
    header('Location:/');
}
//load head and navbar
                require 'Resources/views/head.php';

//load view
                require 'Resources/views/default/admin_product.view.php';

//load footer
                require 'Resources/views/footer.php';
