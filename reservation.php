<?php

session_start();

include "./header.php";

?>

<link rel="stylesheet" href="./assets/reservation.css" />
<p>Merci pour votre réservation !</p>
<div class="reservation">
    <h2>Récapitulatif réservation</h2>
    <table>
        <tr>
            <td class="td1">Nom : </td>
            <td class="td2"><?php echo $_GET["nom"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Prénom : </td>
            <td class="td2"><?php echo $_GET["prenom"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Email : </td>
            <td class="td2"><?php echo $_GET["email"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Nombre de places : </td>
            <td class="td2"><?php echo $_GET["nombrePlaces"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Tarif réduit : </td>
            <td class="td2"><?php echo $_GET["tarifReduit"]; ?></td>
        </tr>
        
        <?php if($_GET["choixNombreJourReduit"] !== "x") { echo ('
        <tr>
            <td class="td1">Pass réduits : </td>
            <td class="td2">'.$_GET["choixNombreJourReduit"].'</td>
        </tr>'); }
        if($_GET["choixNombreJour"] !== "x") { echo ('
        <tr>
            <td class="td1">Pass : </td>
            <td class="td2">'.$_GET["choixNombreJour"].'</td>
        </tr>'); }
        if($_GET["choixPass1jour"] !== "x") { echo ('
        <tr>
            <td class="td1">Jour choisi : </td>
            <td class="td2">'.$_GET["choixPass1jour"].'</td>
        </tr>'); }
        if($_GET["choixPass2Jours"] !== "x") { echo ('
        <tr>
            <td class="td1">Jours choisis : </td>
            <td class="td2">'.$_GET["choixPass2Jours"].'</td>
        </tr>'); }
        if($_GET["tenteNuit1"] !== "x") { echo ('
        <tr>
            <td class="td1">Tente nuit 1 : </td>
            <td class="td2">'.$_GET["tenteNuit1"].'</td>
            </tr>'); }
        if($_GET["tenteNuit2"] !== "x") { echo ('
        <tr>
            <td class="td1">Tente nuit 2 : </td>
            <td class="td2">'.$_GET["tenteNuit2"].'</td>
            </tr>'); }
        if($_GET["tenteNuit3"] !== "x") { echo ('
        <tr>
            <td class="td1">Tente nuit 3 : </td>
            <td class="td2">'.$_GET["tenteNuit3"].'</td>
            </tr>'); }
        if($_GET["tente3Nuits"] !== "x") { echo ('
        <tr>
            <td class="td1">Tente 3 nuits : </td>
            <td class="td2">'.$_GET["tente3Nuits"].'</td>
            </tr>'); }
        if($_GET["vanNuit1"] !== "x") { echo ('
        <tr>
            <td class="td1">Van nuit 1 : </td>
            <td class="td2">'.$_GET["vanNuit1"].'</td>
            </tr>'); }
        if($_GET["vanNuit2"] !== "x") { echo ('
        <tr>
            <td class="td1">Van nuit 2 : </td>
            <td class="td2">'.$_GET["vanNuit2"].'</td>
            </tr>'); }
        if($_GET["vanNuit3"] !== "x") { echo ('
        <tr>
            <td class="td1">Van nuit 3 : </td>
            <td class="td2">'.$_GET["vanNuit3"].'</td>
            </tr>'); }
        if($_GET["van3Nuits"] !== "x") { echo ('
        <tr>
            <td class="td1">Van 3 nuits : </td>
            <td class="td2">'.$_GET["van3Nuits"].'</td>
            </tr>'); } ?>
        <tr>
            <td class="td1">Enfants : </td>
            <td class="td2"><?php echo $_GET["enfant"]; ?></td>
        </tr>
        <?php if($_GET["nombreCasquesEnfants"] !== "0") { echo ('
        <tr>
            <td class="td1">Casques enfant : </td>
            <td class="td2">'.$_GET["nombreCasquesEnfants"].'</td>
            </tr>'); }
            if($_GET["nombreLugesEte"] !== "0") { echo ('
        <tr>
            <td class="td1">Luge été : </td>
            <td class="td2">'.$_GET["nombreLugesEte"].'</td>
            </tr>'); } ?>
        <tr>
            <td class="td3">Prix Total : </td>
            <td class="td4"><?php echo $_GET["prixTotal"] . " €"; ?></td>
        </tr>
    </table>
</div>