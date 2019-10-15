<?php


class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {

        $sql = $this->pdo->prepare("SELECT * FROM $table");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }


    public function getProduct($id)
    {

        $sql = $this->pdo->prepare("SELECT * FROM product WHERE product_id = $id");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function createProduct()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $nutrition = $_POST['nutrition'];
        $price = $_POST['price'];
        $image = $_SESSION['picture'];
        $juice_type = $_POST['juice_type'];
        $product_type = $_POST['product_type'];
        $amount = $_POST['amount'];
        $nutritionNew = nl2br($nutrition, true);


        if (!empty($_POST['name']) || !empty($_POST['description']) || !empty($nutritionNew) || !empty($_POST['price']) || !empty($_POST['amount']) || !empty($_SESSION['picture'])) {
            if ($product_type == 1 || $product_type == 2) {
                if ($juice_type == 1 || $juice_type == 2) {
                    $sql = ("INSERT INTO product 
                    (product_name, product_description, nutrition_value, product_price, product_image, juice_type_juice_type_id, product_type, storage_amount)
                    VALUES ('$name', '$description', '$nutritionNew', '$price', '$image', '$juice_type', $product_type, $amount)
                    ");

                    $sel = $this->pdo->prepare($sql);

                    $sel->execute();
                    return;
                } else {
                    echo 'Je moet een product soort kiezen';
                }
            }
            else{
                echo 'Je moet een prodct type kiezen';
            }
        } else {
            $_POST['upload'] = 'empty';
            echo 'Alles moet ingevuld zijn';
            return;
        }



    }


    public function removeItem($id)
    {
        $sql = ("DELETE FROM product WHERE product_id = '$id'");

        $sel = $this->pdo->prepare($sql);

        $sel->execute();
    }


    public function login($email, $password)
    {

        $sql = $this->pdo->prepare("SELECT * FROM customers WHERE customer_email = '$email' AND customer_password = '$password'");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function register($username, $mail, $pass , $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date )
    {
        //insert de user in de db vergeet niet alle columns!!!!!
        //pass hash
        $sql = "INSERT INTO customers (customer_name, customer_email, 
                                        customer_password, customer_address,
                                        customer_zipcode, customer_phone,
                                        last_updated, payment_method_payment_method_id,
                                        city_city_id, customer_type_customer_type_id)
                VALUES (:name, :email, :password, :address, :zipcode, :phone , :last_updated, :payment, :city, :customer_type)";
        $sel = $this->pdo->prepare($sql);
        $sel->bindValue("name", $username);
        $sel->bindValue("password", $pass);
        $sel->bindValue("email", $mail);
        $sel->bindValue("zipcode", $zipcode);
        $sel->bindValue("address", $address);
        $sel->bindValue("phone", $phone);
        $sel->bindValue("city", $city_id);
        $sel->bindValue("payment", $payment_method);
        $sel->bindValue("customer_type", $customer_type);
        $sel->bindValue("last_updated", $last_updated_date);


        $sel->execute();

    }

    public function getCities()
    {
        //select all cities
        $sql = ("SELECT * FROM city");

        $sel = $this->pdo->prepare($sql);

        $sel->execute();

        $result = $sel->fetchAll();

        return $result;
    }
}