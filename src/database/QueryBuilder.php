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

    public function login($email, $password)
    {

        $sql = $this->pdo->prepare("SELECT * FROM customers WHERE customer_email = $email AND customer_password = $password");
        $sql->execute();

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }
}