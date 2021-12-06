<?php

namespace App\Controller\film;

use App\Controller\AbstractController;
use App\Repository\FilmPDOService;
use App\Repository\TypesPDOService;


class FilmListController extends AbstractController
{
    private FilmPDOService $filmPDOService;
    private TypesPDOService $typesPDOService;
    private ?string $name;
    private ?string $type;
    private ?string $error;

    public function __construct(string $name = null, string $type = 'Genre', string $error = 'false')
    {
        parent::__construct();
        $this->filmPDOService = new FilmPDOService();
        $this->typesPDOService = new TypesPDOService();
        $this->name = $name;
        $this->type = $type;
        $this->error = $error;
    }

    public function __invoke()
    {
        if (!empty($this->name) || $this->type != 'Genre'){
            $films = $this->filmPDOService->getListFilm($this->name,$this->type);
        }else {
            $films = $this->filmPDOService->getListFilm();
        }
        $types = $this->typesPDOService->getTypes();
        $this->display('film/index.html.twig', [
            'films' => $films,
            'types' => $types,
            'error' => $this->error,
        ]);
    }
}