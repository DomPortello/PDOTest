<?php

namespace App\Repository;

use App\Service\PDOConnection;
use PDO;

class TypesPDOService extends PDOConnection
{
    public function getTypes(): ?array
    {
        $pdo = $this->connect();
        $query = 'SELECT DISTINCT `type` FROM `movie`';
        $results = $pdo->prepare($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
}