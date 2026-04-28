<?php
require 'db_config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO UTILISATEUR (nom, prenom, adresse, telephone, email, mot_de_passe) VALUES (?,?,?,?,?,?)";
    $pdo->prepare($sql)->execute([$_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['tel'], $_POST['email'], $mdp]);
    header('Location: connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="style.css"><title>Inscription</title>
</head>
<body>
    <div class="form-container">
        <h2>Créer un compte</h2>
        <form method="POST">
            <div class="form-group"><label>Nom :</label><input type="text" name="nom" required></div>
            <div class="form-group"><label>Prénom :</label><input type="text" name="prenom" required></div>
            <div class="form-group"><label>Adresse :</label><input type="text" name="adresse"></div>
            <div class="form-group"><label>Tel :</label><input type="tel" name="tel" pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required></div>
            <div class="form-group"><label>Email :</label><input type="email" name="email" required></div>
            <div class="form-group"><label>Mot de passe :</label><input type="password" name="mdp" required></div>
            <div class="btn-group"><button type="submit" class="btn-submit">S'inscrire</button></div>
        </form>
    </div>
</body>
</html>