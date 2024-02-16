<?php

namespace Application\bdd;

class DataBase
{
    private static $connection = null;
    private static $host = "localhost";
    private static $dbname = "gestionnaire_contact";
    private static $user = "root";
    private static $password = "";
    public static function connect(): \PDO
    {
        if (self::$connection == null) {
            try {
                self::$connection = new \PDO("mysql:host=" . self::$host . ";
                dbname=" . self::$dbname . ";
                charset=utf8", self::$user, self::$password);
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

}

#David Code
