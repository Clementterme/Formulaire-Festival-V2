<?php

session_start();

include "../config.php";

$bdd = new PDO("mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME . ";charset=utf8;", DATABASE_USERNAME, DATABASE_PASSWORD);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST["email"]);
    }
    $telephone = htmlspecialchars($_POST["telephone"]);
    $adresse = htmlspecialchars($_POST["adressePostale"]);
    if ($_POST["mdp"] == $_POST["mdp2"]) {
        $mdp = htmlspecialchars($_POST["mdp"]);
    }
    $rgpd = date('Y-m-d H:i:sP');

    // Enregistrer l'utilisateur dans la bdd
    $insertUser = $bdd->prepare("INSERT INTO user(nom, prenom, email, mdp, telephone, adresse, rgpd) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $insertUser->execute(array($nom, $prenom, $email, $mdp, $telephone, $adresse, $rgpd));

    // Connexion utilisateur
    $selectUser = $bdd->prepare("SELECT * FROM user WHERE nom = ? AND prenom = ? AND mdp = ? AND email = ?");
            $selectUser->execute(array($nom, $prenom, $mdp, $email));
            if ($selectUser->rowCount() > 0) {
                $_SESSION["nom"] = $nom;
                $_SESSION["prenom"] = $prenom;
                $_SESSION["mdp"] = $mdp;
                $_SESSION["email"] = $email;

                $_SESSION["id"] = $selectUser->fetch()["id"];

                $_SESSION['loggedin'] = TRUE;
            }

    $nombrePlaces = $_POST["nombrePlaces"];

   
    $tarifReduit = isset($_POST["tarifReduit"]) ? "Oui" : "Non"; // Si la case est cochée, renvoie "Oui", sinon "Non"

    if (isset($_POST['nbJourReduit'])) {
        $nombreJourReduit = $_POST['nbJourReduit'];

        if ($nombreJourReduit == "pass1jourreduit") {
            $choixNombreJourReduit = "Pass 1 jour";
            $prixChoixNombreJourReduit = 25;
        }
        if ($nombreJourReduit == "pass2joursreduit") {
            $choixNombreJourReduit = "Pass 2 jours";
            $prixChoixNombreJourReduit = 50;
        }
        if ($nombreJourReduit == "pass3joursreduit") {
            $choixNombreJourReduit = "Pass 3 jours";
            $prixChoixNombreJourReduit = 65;
        }
    }
    if (!isset($_POST['nbJourReduit'])) {
        $choixNombreJourReduit = "x";
        $prixChoixNombreJourReduit = 0;
    }

    if (isset($_POST['nbJour'])) {
        $nombreJour = $_POST['nbJour'];

        if ($nombreJour == "pass1jour") {
            $choixNombreJour = "Pass 1 jour";
            $prixChoixNombreJour = 40;
        }
        if ($nombreJour == "pass2jours") {
            $choixNombreJour = "Pass 2 jours";
            $prixChoixNombreJour = 70;
        }
        if ($nombreJour == "pass3jours") {
            $choixNombreJour = "Pass 3 jours";
            $prixChoixNombreJour = 100;
        }
    }
    if (!isset($_POST['nbJour'])) {
        $choixNombreJour = "x";
        $prixChoixNombreJour = 0;
    }


    if (isset($_POST['datePass1jour'])) {
        $datePass1jour = $_POST['datePass1jour'];

        if ($datePass1jour == "choixJour1") {
            $choixPass1jour = "Jour 1";
        }
        if ($datePass1jour == "choixJour2") {
            $choixPass1jour = "Jour 2";
        }
        if ($datePass1jour == "choixJour3") {
            $choixPass1jour = "Jour 3";
        }
    }
    if (!isset($_POST['datePass1jour'])) {
        $choixPass1jour = "x";
    }


    if (isset($_POST['datePass2jours'])) {
        $passSelection = $_POST['datePass2jours'];

        if ($passSelection == "choixJour12") {
            $choixPass2Jours = "Jour 1 et 2";
        }
        if ($passSelection == "choixJour23") {
            $choixPass2Jours = "Jour 2 et 3";
        }
    }
    if (!isset($_POST['datePass2jours'])) {
        $choixPass2Jours = "x";
    }



    $tenteNuit1 = isset($_POST["tenteNuit1"]) ? "Oui" : "x";
    if ($tenteNuit1 == "Oui") {
        $prixTenteNuit1 = 5;
    } else {
        $prixTenteNuit1 = 0;
    }

    $tenteNuit2 = isset($_POST["tenteNuit2"]) ? "Oui" : "x";
    if ($tenteNuit2 == "Oui") {
        $prixTenteNuit2 = 5;
    } else {
        $prixTenteNuit2 = 0;
    }

    $tenteNuit3 = isset($_POST["tenteNuit3"]) ? "Oui" : "x";
    if ($tenteNuit3 == "Oui") {
        $prixTenteNuit3 = 5;
    } else {
        $prixTenteNuit3 = 0;
    }

    $tente3Nuits = isset($_POST["tente3Nuits"]) ? "Oui" : "x";
    if ($tente3Nuits == "Oui") {
        $prixTente3Nuits = 12;
    } else {
        $prixTente3Nuits = 0;
    }



    $vanNuit1 = isset($_POST["vanNuit1"]) ? "Oui" : "x";
    if ($vanNuit1 == "Oui") {
        $prixVanNuit1 = 5;
    } else {
        $prixVanNuit1 = 0;
    }

    $vanNuit2 = isset($_POST["vanNuit2"]) ? "Oui" : "x";
    if ($vanNuit2 == "Oui") {
        $prixVanNuit2 = 5;
    } else {
        $prixVanNuit2 = 0;
    }

    $vanNuit3 = isset($_POST["vanNuit3"]) ? "Oui" : "x";
    if ($vanNuit3 == "Oui") {
        $prixVanNuit3 = 5;
    } else {
        $prixVanNuit3 = 0;
    }

    $van3Nuits = isset($_POST["van3Nuits"]) ? "Oui" : "x";
    if ($van3Nuits == "Oui") {
        $prixVan3Nuits = 12;
    } else {
        $prixVan3Nuits = 0;
    }



    if (isset($_POST['enfants'])) {

        $enfants = $_POST['enfants'];

        if ($enfants == "enfantsOui") {
            $enfant = "Oui";
        }
        if ($enfants == "enfantsNon") {
            $enfant = "Non";
        }
    }

    $nombreCasquesEnfants = $_POST["nombreCasquesEnfants"];

    $nombreLugesEte = $_POST["NombreLugesEte"];

    // Enregistrer la reservation dans la bdd
    $insertReservation = $bdd->prepare("INSERT INTO reservation(nb_resa, enfants, luge, casque, id_user) VALUES(?, ?, ?, ?, ?)");
    $insertReservation->execute(array($nombrePlaces, $enfants, $nombreLugesEte, $nombreCasquesEnfants, $_SESSION["id"]));
}

$prixNuite = $prixTenteNuit1 + $prixTenteNuit2 + $prixTenteNuit3 + $prixTente3Nuits + $prixVanNuit1 + $prixVanNuit2 + $prixVanNuit3 + $prixVan3Nuits;

$prixTotal = (($prixChoixNombreJourReduit + $prixChoixNombreJour) * $nombrePlaces) + $prixTenteNuit1 + $prixTenteNuit2 + $prixTenteNuit3 + $prixTente3Nuits + $prixVanNuit1 + $prixVanNuit2 + $prixVanNuit3 + $prixVan3Nuits + ($nombreCasquesEnfants * 2) + ($nombreLugesEte * 5);

// Enregistrer le pass dans la bdd
$insertPass = $bdd->prepare("INSERT INTO pass(jours, tarif_reduit, date_jour, prix) VALUES(?, ?, ?, ?)");
$insertPass->execute(array($nombreJour, $tarifReduit, $passSelection, $prixTotal));

// Enregistrer la nuite dans la bdd
$insertNuite = $bdd->prepare("INSERT INTO nuite(nom, prix) VALUES(?, ?)");
$insertNuite->execute(array($passSelection, $prixNuite)); 

header("location: ../reservation.php?prixTotal=$prixTotal&nom=$nom&prenom=$prenom&email=$email&nombrePlaces=$nombrePlaces&tarifReduit=$tarifReduit&choixNombreJourReduit=$choixNombreJourReduit&choixNombreJour=$choixNombreJour&choixPass1jour=$choixPass1jour&choixPass2Jours=$choixPass2Jours&tenteNuit1=$tenteNuit1&tenteNuit2=$tenteNuit2&tenteNuit3=$tenteNuit3&tente3Nuits=$tente3Nuits&vanNuit1=$vanNuit1&vanNuit2=$vanNuit2&vanNuit3=$vanNuit3&van3Nuits=$van3Nuits&enfant=$enfant&nombreCasquesEnfants=$nombreCasquesEnfants&nombreLugesEte=$nombreLugesEte");
