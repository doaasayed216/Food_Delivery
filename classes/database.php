<?php
class Database
{
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $db_name = "food-delivery";
    private $username = "root";
    private $password = "";
  
    private function __construct()
    {
       $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>