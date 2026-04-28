<?php
session_start();
require 'db_config.php';
if($_SESSION['role'] !== 'admin') { header('Location: connexion.php'); exit(); }

$demandes = $pdo->query("SELECT D.*, U.nom, U.prenom FROM DEMANDE D JOIN UTILISATEUR U ON D.id_utilisateur = U.id_utilisateur")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="style.css"><title>Admin</title>
</head>
<body>
    <header><h1>Panel Admin</h1><nav><a href="connexion.php">Déconnexion</a></nav></header>
    <div style="width:90%; margin: 20px auto;">
        <h2>Toutes les demandes</h2>
        <table>
            <tr><th>Client</th><th>Début</th><th>Fin</th><th>Contact</th><th>Tel Contact</th></tr>
            <?php foreach($demandes as $d): ?>
            <tr>
                <td><?= $d['prenom']." ".$d['nom'] ?></td>
                <td><?= $d['date_debut'] ?></td><td><?= $d['date_fin'] ?></td>
                <td><?= $d['contact_nom'] ?></td><td><?= $d['contact_telephone'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>