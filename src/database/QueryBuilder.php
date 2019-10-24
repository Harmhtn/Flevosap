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

    public function selectUserAddress($table, $userId)
    {
        $sql = $this->pdo->prepare("SELECT customer_address FROM $table WHERE customer_id = $userId");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function orderByName($table)
    {
        $sql = $this->pdo->prepare("SELECT * FROM $table ORDER BY product_name");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function orderByPriceHigh($table)
    {
        $sql = $this->pdo->prepare("SELECT * FROM $table ORDER BY product_price DESC");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function orderByPriceLow($table)
    {
        $sql = $this->pdo->prepare("SELECT * FROM $table ORDER BY product_price ASC");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


    public function getProduct($id)
    {
        $sql = ("SELECT * FROM product WHERE product_id = :id ");

        $sel = $this->pdo->prepare($sql);
        $sel->bindValue('id', $id);
        $sel->execute();


        $results = $sel->fetchAll(PDO::FETCH_ASSOC);

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
                    VALUES ( :name , :description , :nutrition , :price , :image, :juiceType , :productType , :amount)
                    ");

                    $sel = $this->pdo->prepare($sql);
                    $sel->bindValue('name', $name);
                    $sel->bindValue('description', $description);
                    $sel->bindValue('nutrition', $nutritionNew);
                    $sel->bindValue('price', $price);
                    $sel->bindValue('image', $image);
                    $sel->bindValue('juiceType', $juice_type);
                    $sel->bindValue('productType', $product_type);
                    $sel->bindValue('amount', $amount);

                    try {
                        $sel->execute();
                    }
                    catch (exeption $e){

                        $_SESSION['error'] = true;

                    }
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

    public function blockUser($id)
    {
        $sql = ("UPDATE customers SET customer_type_customer_type_id = 4 WHERE customer_id = $id");

        $sel = $this->pdo->prepare($sql);

        $sel->execute();
    }

    public function deBlockUser($id)
    {
        $sql = ("UPDATE customers SET customer_type_customer_type_id = 1 WHERE customer_id = $id");

        $sel = $this->pdo->prepare($sql);

        $sel->execute();
    }


    public function login($email, $password)
    {
        $sql = $this->pdo->prepare("SELECT * FROM customers WHERE customer_email = '$email' AND customer_password = '$password'");


        try {
            $sql->execute();
        }
        catch (exeption $e){
        $_SESSION['error'] = true;
        }
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
    public function checkBlock($email, $password){
        $sql = $this->pdo->prepare("SELECT customer_type_customer_type_id FROM customers WHERE customer_email = '$email' AND customer_password = '$password'");
        $sql->execute();

        $results = $sql->fetchAll();

        return $results;
    }

    public function register($username, $mail, $pass, $zipcode, $phone, $address, $city_id, $payment_method, $customer_type, $last_updated_date)
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
        $error = false;
        try {
            $sel->execute();
        }
        catch (exception $e){
            $error = true;

        }
        return $error;
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

    public function placeOrder($newAddress, $customerId, $paymentMethodId, $orderDateConverted, $orderNote)
    {

        $sql = "INSERT INTO orders(order_date,
                            order_note, payment_method_id, delivery_address,
                            customers_customer_id) 
                VALUES (:orderDate, :orderNote, :paymentId, :deliveryAddress, :customersId)";
        $sel = $this->pdo->prepare($sql);
        $sel->bindValue('orderDate', $orderDateConverted);
        $sel->bindValue('orderNote', $orderNote);
        $sel->bindValue('paymentId', $paymentMethodId);
        $sel->bindValue('deliveryAddress', $newAddress);
        $sel->bindValue('customersId', $customerId);

        return $sel->execute();
    }
}
