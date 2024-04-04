<?php

namespace src\Controllers;

use src\Models\User;
use src\Repository\UserRepository;

class UserController 
{
   public $UserRepository;
   
    public function __construct()
    {
        $this->UserRepository = new UserRepository();
    }

    public function index()
    {
        $User = $this->UserRepository->getAll();


    }

    public function create ()
    {

        $newUser = new User(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['mdp'],
            $_POST['telephone'],
            $_POST['adressePostale'],

        );

        $this->UserRepository->create($newUser);


    }

    public function update()
    {
        __METHOD__ . [$_POST];

        $updatedUser = new User(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['mdp'],
            $_POST['telephone'],
            $_POST['adressePostale'],
        );
    
    $this->userRepository->update($updatedUser);    
    }
}