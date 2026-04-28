<?php
session_start();
require 'db_config.php';
if(!isset($_SESSION['user_id'])) { header('Location: connexion.php'); exit(); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO DEMANDE (date_debut, date_fin, contact_nom, contact_telephone, id_utilisateur) VALUES (?,?,?,?,?)";
    $pdo->prepare($sql)->execute([$_POST['date_debut'], $_POST['date_fin'], $_POST['contact_nom'], $_POST['contact_tel'], $_SESSION['user_id']]);
    echo "<script>alert('Demande envoyée !');</script>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="style.css"><title>Surveillance</title>
</head>
<body>
    <header><h1>Mairie Connect</h1><nav><a href="connexion.php">Déconnexion</a></nav></header>
    <div class="form-container">
        <h2>Ma Demande</h2>
        <form method="POST">
            <div class="form-group"><label>Début :</label><input type="date" name="date_debut" required></div>
            <div class="form-group"><label>Fin :</label><input type="date" name="date_fin" required></div>
            <div class="form-group"><label>Contact :</label><input type="text" name="contact_nom" required></div>
            <div class="form-group"><label>Tel Contact :</label><input type="tel" pattern="[0-9]{10}" maxlength="10" name="contact_tel" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required></div>
            <div class="btn-group"><button type="submit" class="btn-submit">Envoyer</button></div>
        </form>
    </div>
</body>
</html>