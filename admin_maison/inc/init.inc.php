<?php
// $pdo = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$hote='localhost';
$bdd ='site_cvv';
$utilisateur='root';
$passe='';
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);
// $pdoCv est le nom de la variable de la connexion qui sert partout où l'on doit se servir de cette connexion
$pdo -> exec('SET NAMES utf8');


session_start();
// gestion des contenus de la BDD table utilisateurs
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $resultat -> fetch();

?>
