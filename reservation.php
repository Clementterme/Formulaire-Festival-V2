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
            <td class="td2"><?php echo $_POST["nom"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Prénom : </td>
            <td class="td2"><?php echo $_POST["prenom"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Email : </td>
            <td class="td2"><?php echo $_POST["email"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Nombre de places : </td>
            <td class="td2"><?php echo $_POST["nombrePlaces"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Tarif réduit : </td>
            <td class="td2"><?php echo $_POST["tarifReduit"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Pass réduits : </td>
            <td class="td2"><?php echo $_POST["choixNombreJourReduit"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Pass : </td>
            <td class="td2"><?php echo $_POST["choixNombreJour"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Jour choisi : </td>
            <td class="td2"><?php echo $_POST["choixPass1jour"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Jours choisis : </td>
            <td class="td2"><?php echo $_POST["choixPass2Jours"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Tente nuit 1 : </td>
            <td class="td2"><?php echo $_POST["tenteNuit1"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Tente nuit 2 : </td>
            <td class="td2"><?php echo $_POST["tenteNuit2"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Tente nuit 3 : </td>
            <td class="td2"><?php echo $_POST["tenteNuit3"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Tente 3 nuits : </td>
            <td class="td2"><?php echo $_POST["tente3Nuits"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Van nuit 1 : </td>
            <td class="td2"><?php echo $_POST["vanNuit1"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Van nuit 2 : </td>
            <td class="td2"><?php echo $_POST["vanNuit2"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Van nuit 3 : </td>
            <td class="td2"><?php echo $_POST["vanNuit3"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Van 3 nuits : </td>
            <td class="td2"><?php echo $_POST["van3Nuits"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Enfants : </td>
            <td class="td2"><?php echo $_POST["enfant"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Casques enfant : </td>
            <td class="td2"><?php echo $_POST["nombreCasquesEnfants"]; ?></td>
        </tr>
        <tr>
            <td class="td1">Luge été : </td>
            <td class="td2"><?php echo $_POST["nombreLugesEte"]; ?></td>
        </tr>
        <tr>
            <td class="td3">Prix Total : </td>
            <td class="td4"><?php echo $_POST["prixTotal"] . "€"; ?></td>
        </tr>
    </table>
</div>