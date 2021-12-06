<?php

namespace App\Service;

use Exception;
use PDO;

class PDOConnection
{
    public function connect(): PDO
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=exercice_pdo', 'root', '');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $pdo;
    }
}