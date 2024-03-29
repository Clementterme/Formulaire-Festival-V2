<?php

namespace src\Controllers;

use src\Services\Reponse;

class AccueilController
{
    use Reponse;

    public function index(): void 
    {
    
            $this->render("Accueil");
        }
}