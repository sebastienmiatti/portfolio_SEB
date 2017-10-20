<?php
require('connexion.php');
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $resultat -> fetch();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet"><!-- importation bootstrap CSS -->

        <title>Site cv-<?= ($ligne_utilisateur['prenom']); ?> <?= ($ligne_utilisateur['nom']); ?></title>
    </head>

    <body>
        <div class="container-fluid">
