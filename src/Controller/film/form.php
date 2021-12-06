<?php

namespace App\Controller\film;


if (isset($_POST['filmName'])){
    $filmName = $_POST['filmName'];
}
if (isset($_POST['filmType'])){
    $typeName = $_POST['filmType'];
}
if (isset($_POST['publishedAt'])){
    $publishedAt = $_POST['publishedAt'];
}
if (isset($_POST['filmDesc'])){
    $filmDesc = $_POST['filmDesc'];
}

$film = new \App\Repository\FilmPDOService();
$film->addFilm($filmName, $typeName, new DateTime($publishedAt), $filmDesc);