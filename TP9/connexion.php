<?php
session_start();
require 'db_config.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM UTILISATEUR WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['mdp'], $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id_utilisateur'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['nom'] = $user['nom'];
        header($user['role'] === 'admin' ? 'Location: admin.php' : 'Location: surveillance.php');
        exit();
    } else { $error = "Identifiants incorrects."; }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="style.css"><title>Connexion</title>
</head>
<body>
    <header><h1>Mairie Connect</h1></header>
    <div class="form-container">
        <h2>Connexion</h2>
        <?php if($error) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group"><label>Email :</label><input type="email" name="email" required></div>
            <div class="form-group"><label>Mot de passe :</label><input type="password" name="mdp" required></div>
            <p>Pas de compte ? <a href="inscription.php">S'inscrire</a></p>
            <div class="btn-group"><button type="submit" class="btn-submit">Se connecter</button></div>
        </form>
    </div>
</body>
</html>