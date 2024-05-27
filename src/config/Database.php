<?php
namespace App\Config;

use PDO;

class Database
{
    private $host = 'localhost';
    private $db_name = 'contact_manager';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}

?>
