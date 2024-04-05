<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vercors Music Festival</title>
  <link rel="stylesheet" href="./assets/header.css">
  <link rel="stylesheet" href="./assets/style.css" />
  <script src="assets/script.js" defer></script>
</head>
<header>

  <div id="header">
    <div>
      <a class="logo" href="index.php">
        <img src="./image/vercors_festival_music.png" alt="logo">
      </a>
      <?php if (isset($_SESSION['loggedin'])) {
        echo '<div class="bonjour"><a class="bonjourUtilisateur">Bonjour '.$_SESSION["prenom"].' !</a></div>';
     }?>
    </div>
    <div class="connexion">
    <?php if (isset($_SESSION['loggedin'])) { ?>
      <a href="./reservation.php" class="boutonReservations">Mes réservations</a>
      <a href="./logout.php">Déconnexion</a>
      <?php } else { ?>
      <a href="./login.php">Connexion</a>
      <?php }; ?>
    </div>
  </div>

</header>