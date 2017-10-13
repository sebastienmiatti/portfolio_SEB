<?php

require 'connexion.php';
// je récupère la compétence
$id_competence = $_GET['id_competence']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete est égal a l'id
$ligne_competence = $resultat->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    </head>
    <body>
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        <p>texte</p>
        <hr>
        <h2>modification d'une competence</h2>
        <p><?php echo ($ligne_competence['competence']); ?></p>
    </body>
</html>
