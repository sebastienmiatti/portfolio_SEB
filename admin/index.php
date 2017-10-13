<?php
require 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdo -> query('SELECT * FROM t_utilisateurs');
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    </head>
    <body>
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        <p>texte</p>
        <hr>
        <?php
        $resultat = $pdo -> query('SELECT * FROM t_competences');
        $ligne_competence = $resultat -> fetch();
        ?>
    </body>
</html>
