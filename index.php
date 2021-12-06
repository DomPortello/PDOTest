<?php

require 'vendor/autoload.php';

if (empty($_GET['page'])){
    if (isset($_GET['error'])){
        (new \App\Controller\film\FilmListController(null, 'Genre', $_GET['error']))();
    }elseif ((isset($_POST['filmName']) && !empty($_POST['filmName'])) || ((isset($_POST['filmType']) && $_POST['filmType'] != 'Genre'))){
        (new \App\Controller\film\FilmListController($_POST['filmName'], $_POST['filmType']))();
    } else {
        (new App\Controller\film\FilmListController())();
    }
} elseif ($_GET['page'] == 'film-detail'){
    if (!empty($_GET['id'])){
        (new App\Controller\film\FilmItemController($_GET['id']))();
    }
} elseif ($_GET['page'] == 'form'){
    (new \App\Controller\film\FormController())();
}