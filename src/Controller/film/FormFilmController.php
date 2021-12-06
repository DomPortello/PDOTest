<?php

namespace App\Controller\film;

use App\Controller\AbstractController;
use App\Repository\FilmPDOService;


class FormFilmController extends AbstractController
{
    private FilmPDOService $filmPDOService;
    private string $filmName;
    private string $typeName;
    private \DateTime $launchDate;
    private string $descFilm;

    public function __construct()
    {
        parent::__construct();
        $this->filmPDOService = new FilmPDOService();

        if (isset($_POST['filmName'])){
            $filmName = $_POST['filmName'];
            $this->filmName = $filmName;
        }
        if (isset($_POST['filmType'])){
            $typeName = $_POST['filmType'];
            $this->typeName = $typeName;
        }
        if (isset($_POST['publishedAt'])){
            $launchDate = $_POST['publishedAt'];
            $this->launchDate = $launchDate;
        }
        if (isset($_POST['filmDesc'])){
            $descFilm = $_POST['filmDesc'];
            $this->descFilm = $descFilm;
        }

    }

    public function __invoke()
    {
        $this->filmPDOService->addFilm($this->filmName,$this->typeName,$this->launchDate,$this->descFilm);

    }

}