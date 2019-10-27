<?php


class Connection
{
    public static function make($config)
    {
        try {
            //try to start a new pdo connection with the credentials from the config file
            return new PDO(
                'mysql:host=' . $config['server_name'] . ';dbname=' . $config['db_name'] . '',
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
        }
    }
}
