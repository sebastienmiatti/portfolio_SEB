<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_cvv', 'root', '') or die(print_r($bdd->errorInfo()));
    $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
