<?php

namespace App\Controller\film;

use App\Entity\Movie;
use App\Controller\AbstractController;
use App\Repository\FilmPDOService;

class FilmItemController extends AbstractController
{
    private FilmPDOService $filmPDOService;
    private int $filmId;
    private Movie $movie;

    public function __construct(int $filmId)
    {
        parent::__construct();
        $this->filmPDOService = new FilmPDOService();
        $this->filmId = $filmId;
        $this->movie = $this->filmPDOService->getOneFilm($this->filmId);
    }

    public function __invoke()
    {
        $this->display('film/show.html.twig', [
            'movie' => $this->movie
        ]);
    }
}