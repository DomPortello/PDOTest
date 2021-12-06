<?php

namespace App\Repository;

use App\Entity\Movie;
use PDO;
use App\Service\PDOConnection;

class FilmPDOService extends PDOConnection
{

    public function getListFilm(string $name = null, string $type = 'Genre'): ?array
    {
        $pdo = $this->connect();
        $param = [];
        if (empty($name) && $type == 'Genre') {

            $query = 'SELECT * FROM `movie` ORDER BY `movie`.`launch_at` ASC';

            $results = $pdo->query($query);
            $results->execute();

            $rows = $results->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        } elseif (!empty($name) && $type == 'Genre') {
            $query = 'SELECT * FROM `movie` WHERE `name` LIKE :film_name';
            $param[':film_name'] = "%$name%";
        } elseif (empty($name) && $type != 'Genre') {
            $query = 'SELECT * FROM `movie` WHERE `type` LIKE :film_type';
            $param[':film_type'] = "%$type%";

        } elseif (!empty($name) && $type != 'Genre') {
            $query = 'SELECT * FROM `movie` WHERE `name` LIKE :film_name AND `type` LIKE :film_type';
            $param[':film_name'] = "%$name%";
            $param[':film_type'] = "%$type%";
        }
        $results = $pdo->prepare($query);
        $results->execute($param);

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        if (empty($rows)){
            header('location:../index.php?error=true');
        }
        return $rows;
    }

    public function getOneFilm(int $filmId): ?Movie
    {
        $pdo = $this->connect();
        $query = 'SELECT * FROM `movie` WHERE `id` = :film_id';
        $results = $pdo->prepare($query);
        $results->execute([
            'film_id' => $filmId,
        ]);

        $rows = $results->fetch(PDO::FETCH_ASSOC);

        return (new Movie($rows['launch_at']))->hydrate($rows);
    }

    public function addFilm(string $filmName, string $typeName, \DateTime $launchDate, string $descFilm)
    {
        $pdo = $this->connect();
        $query = 'INSERT INTO `movie`(`name`, `type`, `launch_at`, `description`) VALUES (:filmName,:typeName,:launchDate,:descFilm)';
        $results = $pdo->prepare($query);
        $results->execute([
            ':filmName' => $filmName,
            ':typeName' => $typeName,
            ':launchDate' => $launchDate,
            ':descFilm' => $descFilm,
        ]);
    }
}