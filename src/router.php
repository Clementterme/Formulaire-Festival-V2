<?php

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
    case HOME_URL:
        if(isset($_SESSION['connecté'])) {
            header('location: ' .HOME_URL. 'dashboard');
            die;
        } else {
            $AccueilControler->index();
        }
        break;

        case HOME_URL. 'connexion':
            if (isset ($_SESSION['connecté'])) {
                header('location:/dashboard');
                die;
            } else {
                if ($methode === 'POST') {
                    $AccueilControler->auth($_POST['mdp']);

                } else {
                    $accueilController->index();
                }
            }
            break;

            case HOME_URL. 'deconnexion':
                $AccueilController->quit();
                break;

                case str_contains($route, "dashboard"):
                    if (isset($_SESSION["connecté"])) {
                       
                        switch ($route) {
                            case str_contains($route, "users"):
                                switch ($route) {
                                    case str_contains ($route, "new"):
                                        if ($methode === "POST") {
                                            $data = $_POST;
                                            $Usercontroller->save($data);
                                        } else {
                                            $UserController->new();
                                        }
                                        break;

                                        // case str_contains($route, )
                                }
                        }
                    }
}