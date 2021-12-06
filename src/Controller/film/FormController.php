<?php

namespace App\Controller\film;

use App\Controller\AbstractController;
use App\Repository\TypesPDOService;

class FormController extends AbstractController
{
    private TypesPDOService $typesPDOService;

    public function __construct()
    {
        parent::__construct();
        $this->typesPDOService = new TypesPDOService();
    }


    public function __invoke()
    {
        $types = $this->typesPDOService->getTypes();

        $this->display('film/form.html.twig',[
            'types' => $types,
        ]);
    }

}