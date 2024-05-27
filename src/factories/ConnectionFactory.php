<?php
namespace App\Factories;

use App\Config\Database;
use PDO;

class ConnectionFactory
{
    public static function create(): PDO
    {
        $database = new Database();
        return $database->connect();
    }
}

?>
