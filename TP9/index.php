<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes en ligne</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">MaVille <strong>En Ligne</strong></div>
    <nav>
        <a href="#" class="active">Demandes</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>
</header>

<div class="container">
    <aside class="sidebar">
        <h2>Menu</h2>
        <a href="#">Mon Profil</a>
        <a href="#">Suivre mes dossiers</a>
        <a href="#">Paramètres</a>
    </aside>

    <main class="content">
        <div class="forms-container">
            
            <form class="form-block" action="#" method="POST">
                <h3>Création d'un compte</h3>
                <div class="field"><label>Nom :</label><input type="text" required></div>
                <div class="field"><label>Prénom :</label><input type="text" required></div>
                <div class="field"><label>Adresse :</label><input type="text"></div>
                <div class="field"><label>Téléphone :</label><input type="tel" pattern="[0-9]{10}"></div>
                <div class="field"><label>Email :</label><input type="email" required></div>
                <div class="field"><label>Mot de passe :</label><input type="password" required></div>
                <div class="field"><label>Confirmation :</label><input type="password" required></div>
                <div class="buttons">
                    <button type="submit" class="btn-blue">Créer le compte</button>
                    <button type="reset" class="btn-gray">Annuler</button>
                </div>
            </form>

            <form class="form-block" action="#" method="POST">
                <h3>Connexion</h3>
                <div class="field"><label>Email :</label><input type="email" required></div>
                <div class="field"><label>Mot de passe :</label><input type="password" required></div>
                <div class="buttons">
                    <button type="submit" class="btn-blue">Se connecter</button>
                    <button type="reset" class="btn-gray">Annuler</button>
                </div>
            </form>

            <form class="form-block" action="#" method="POST">
                <h3>Demande de surveillance</h3>
                <div class="field"><label>Date de début d'absence :</label><input type="date" required></div>
                <div class="field"><label>Date de fin d'absence :</label><input type="date" required></div>
                <div class="field"><label>Personne à contacter :</label><input type="text" required></div>
                <div class="field"><label>Téléphone du contact :</label><input type="tel" required></div>
                <div class="buttons">
                    <button type="submit" class="btn-blue">Envoyer la demande</button>
                    <button type="reset" class="btn-gray">Annuler</button>
                </div>
            </form>

        </div>
    </main>
</div>

<footer>
    <div class="footer-box">Portail administratif - 2026</div>
</footer>

</body>
</html>