<?php
include "./header.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];

    // Vérification mot de passe
    if ($password === "0000") {
        $_SESSION["loggedin"] = true;
        header("location: admin.php");
        exit;
    } else {
        $login_err = "Mot de passe incorrect";
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
<main>
    <h1>Connexion</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Connexion</button>
    </form>
    <?php if (isset($login_err)) : ?>
        <p><?php echo $login_err; ?></p>
    <?php endif; ?>
</main>

</html>