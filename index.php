<?php

session_start();

include "./header.php";
?>

<body>
<div class="formu">
  <form action="./traitement/traitement.php" id="inscription" method="POST">
    <fieldset id="reservation">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" value="1" min="1" required>
      <h3>Réservation(s) en tarif réduit</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <section id="passTarifNormal">
      <input type="radio" value="pass1jour" name="nbJour" id="pass1jour">
      <label for="pass1jour">Pass 1 jour : 40€</label>
      <input type="radio" value="pass2jours" name="nbJour" id="pass2jours">
      <label for="pass2jours">Pass 2 jours : 70€</label>
      <input type="radio" value="pass3jours" name="nbJour" id="pass3jours">
      <label for="pass3jours">Pass 3 jours : 100€</label>
      </section>

       <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
       <section id="passTarifReduit">
      <input type="radio" value="pass1jourreduit" name="nbJourReduit" id="pass1jourreduit">
      <label for="pass1jourreduit">Pass 1 jour : 25€</label>
      <input type="radio" value="pass2joursreduit" name="nbJourReduit" id="pass2joursreduit">
      <label for="pass2joursreduit">Pass 2 jours : 50€</label>
      <input type="radio" value="pass3joursreduit" name="nbJourReduit" id="pass3joursreduit">
      <label for="pass3joursreduit">Pass 3 jours : 65€</label>
      </section>

      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate">
        <input type="radio" name="datePass1jour" value="choixJour1" id="choixJour1">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="radio" name="datePass1jour" value="choixJour2" id="choixJour2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="radio" name="datePass1jour" value="choixJour3" id="choixJour3">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>

      

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate">
        <input type="radio" value="choixJour12" name="datePass2jours" id="choixJour12">
        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="radio" value="choixJour23" name="datePass2jours" id="choixJour23">
        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
      </section>

      


     

      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->
    <div class="boutons">
      <button class="bouton" onclick="suivant()">Suivant</button>
    </div>
    </fieldset>
    <fieldset id="options">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé : </h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="radio" value="enfantsOui" name="enfants" id="enfantsOui"><label for="enfants">Oui</label>
      <input type="radio" value="enfantsNon" name="enfants" id="enfantsNon"><label for="enfants">Non</label>

      <!-- Si oui, afficher : -->
      <section>
        <h3>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h3>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" value="0" min="0">
        <p>*Dans la limite des stocks disponibles.</p>
      </section>

      <h3>Profitez de descentes en luge d'été à tarifs avantageux ! (5€ / descente)</h3>
      <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
      <input type="number" name="NombreLugesEte" id="NombreLugesEte" value="0" min="0">

      <br>
      <div class="boutons">
        <?php if (isset($_SESSION['loggedin'])) { ?>
        <input type="submit" name="soumission" class="bouton" value="Réserver">
        <?php } else { ?>
        <button class="bouton" onclick="suivant2()">Suivant</button>
        <?php } ?>
      </div>
    </fieldset>
    <fieldset id="coordonnees">
      <legend>Coordonnées</legend>
      <div class="coordonnees">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <br>
      </div>
      <div class="coordonnees">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <br>
      </div>
      <div class="coordonnees">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <br>
      </div>
      <div class="coordonnees">
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>
        <br>
      </div>
      <div class="coordonnees">
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" required>
        <br>
      </div>
      <div class="coordonnees">
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required>
        <br>
      </div>
      <div class="coordonnees">
        <label for="mdp2">Confirmer le mot de passe :</label>
        <input type="password" name="mdp2" id="mdp2" required>
        <br>
      </div>
      <div class="boutons">
        <input type="submit" name="soumission" class="bouton" value="Réserver">
      </div>
    </fieldset>
  </form>
</div>
</body>
</html>