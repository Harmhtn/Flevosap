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

    public function createProduct(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $nutrition = $_POST['nutrition'];
        $price = $_POST['price'];
        $image = $_SESSION['picture'];
        $juice_type = $_POST['juice_type'];
        $nutritionNew = nl2br(  $nutrition, true);


        if(!empty($name) || !empty($description) || !empty($nutritionNew) || !empty($price) || !empty($image) || !empty($juice_type)) {
            $sql = ("INSERT INTO product 
            (product_name, product_description, nutrition_value, product_price, product_image, juice_type_juice_type_id)
            VALUES ('$name', '$description', '$nutritionNew', '$price', '$image', '$juice_type')
            ");

            $sel = $this->conn->prepare($sql);

            $sel->execute();
            return;
        }
        else{
            $_POST['upload'] = 'empty';
            return;
        }
    }


    public function removeItem($id){
        $sql = ("DELETE FROM product WHERE product_id = '$id'");

        $sel = $this->conn->prepare($sql);

        $sel->execute();

    }
}