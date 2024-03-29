<?php

namespace src\Controllers;

use src\Models\User;
use src\Repository\UserRepository;

class UserController 
{
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        $users = $this->userRepository->getAll();


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

        $this->userRepository->create($newUser);


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