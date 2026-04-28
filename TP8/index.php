<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio SISR - BERTHEAU Trystan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include('header.php'); ?>

    <div class="container">
        
        <aside class="sidebar">
            <?php
            // On récupère le TP choisi en haut, sinon par défaut TP3
            $tp = $_GET['tp'] ?? 'TP3'; 
            echo "<h2>$tp</h2>";
            
            // Liste manuelle des fichiers selon tes captures d'écran
            $exercices = [];
            if ($tp == 'TP3') {
                $exercices = ['tp3.html'];
            } elseif ($tp == 'TP4') {
                $exercices = ['index.html'];
            } elseif ($tp == 'TP5') {
                $exercices = ['exercice_1.html', 'exercice_2.html', 'exercice_3.html'];
            } elseif ($tp == 'TP6') {
                $exercices = ['index.html'];
            } elseif ($tp == 'TP7') {
                // On génère la liste zoning1 à zoning7
                for($i=1; $i<=7; $i++) { $exercices[] = "zoning$i.html"; }
            } elseif ($tp == 'TP9') {
                $exercices = ['connexion.php'];
            } elseif ($tp == 'TP10') {
                $exercices = ['index.html'];
            }

            // Affichage des liens à gauche
            foreach ($exercices as $ex) {
                $label = str_replace('.html', '', $ex);
                echo "<a href='?tp=$tp&page=$ex'>$label</a>";
            }
            ?>
        </aside>

        <main class="content">
            <?php
            $page = $_GET['page'] ?? null;

            if ($tp && $page) {
                
                // --- CONSTRUCTION DU CHEMIN EN CLAIR ---
                if ($tp == 'TP7') {
                    // Pour le TP7, le chemin est : TP7/Exercice 2/zoningX/zoningX.html
                    $nomDossier = str_replace('.html', '', $page);
                    $cheminFinal = "TP7/Exercice 2/" . $nomDossier . "/" . $page;
                } else {
                    // Pour les autres (TP3, TP4...), le chemin est : TPX/fichier.html
                    $cheminFinal = $tp . "/" . $page;
                }

                // --- VÉRIFICATION DU FICHIER SUR LE DISQUE ---
                if (file_exists($cheminFinal)) {
                    // Si le fichier existe, on l'affiche dans une iframe
                    echo "<iframe src='$cheminFinal' width='100%' height='100%' frameborder='0'></iframe>";
                } else {
                    // SI CA NE MARCHE PAS : Ce message s'affichera pour t'aider
                    echo "<div class='error-debug'>";
                    echo "<h3>Fichier non trouvé !</h3>";
                    echo "<p>Le script a cherché ici : <code>$cheminFinal</code></p>";
                    echo "<p>Vérifiez bien l'orthographe de vos dossiers (Majuscules/Espaces).</p>";
                    echo "</div>";
                }

            } else {
                // Message d'accueil si rien n'est sélectionné
                echo "<div class='welcome-msg'>";
                echo "<h1>Bienvenue sur mon Portfolio SISR</h1>";
                echo "<p>Sélectionnez un TP dans la barre bleue, puis un exercice dans le menu de gauche.</p>";
                echo "</div>";
            }
            ?>
        </main>
    </div>

    <?php include('footer.php'); ?>

</body>
</html>