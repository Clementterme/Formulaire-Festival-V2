<?php

include "./header.php";
include "./config.php";

session_start();

$bdd = new PDO("mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME . ";chars et=utf8;", DATABASE_USERNAME, DATABASE_PASSWORD);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mdp = $_POST["password"];

    // Vérification mot de passe
    if (empty($_POST["email"]) && !empty($_POST["password"])) {
        if ($mdp === "0000") {
            $_SESSION["prenom"] = "Admin";
            $_SESSION["loggedin"] = true;
            header("location: admin.php");
            exit;
        }
    } else if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['password']);

        $selectUser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND mdp = ?");
        $selectUser->execute(array($email, $mdp));

        if ($selectUser->rowCount() > 0) {
            $_SESSION["email"] = $email;
            $_SESSION["mdp"] = $mdp;
            $_SESSION["prenom"] = $selectUser->fetch()["prenom"];

            $_SESSION['loggedin'] = TRUE;

            header("location: index.php");
        } else {
            echo "Email ou mot de passe incorrect";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion</title>
    <link rel="stylesheet" href="./assets/login.css" />
</head>
<main class="login">
    <h1>Connexion</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Connexion</button>
    </form>
    <?php if (isset($login_err)) : ?>
        <p><?php echo $login_err; ?></p>
    <?php endif; ?>
</main>

</html>