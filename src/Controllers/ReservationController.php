<?php
namespace src\Controllers;


use src\Models\Reservation;
use src\Repository\PassRepository;
use src\Repository\NuiteRepository;
use src\Repository\UserRepository;
use src\Services\Reponse;



class ReservationController
{

    private $PassRepo;
    private $NuiteRepo;
    private $UserRepo;
    
    use Reponse;

    public function __construct()
    {
        $this->UserRepo = new UserRepository();
        $this->PassRepo = new PassRepository();
        $this->NuiteRepo = new NuiteRepository();
    }

    public function index()
    {
        $users = $this->UserRepo->getAllUsers();
        $this->render("Dashboard", ['section' => 'users', 'users' =>$users]);

    }


}