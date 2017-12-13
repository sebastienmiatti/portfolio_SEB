<?php
// try {
//     $bdd = new PDO('mysql:host=db714439183.db.1and1.com;dbname=db714439183', 'dbo714439183', '@Tchikito9792') or die(print_r($bdd->errorInfo()));
//     $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }

// $pdo = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$hote='localhost';
$bdd ='site_cv';
$utilisateur='root';
$passe='';
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);
// $pdoCv est le nom de la variable de la connexion qui sert partout où l'on doit se servir de cette connexion
$pdo -> exec('SET NAMES utf8');

// gestion des contenus de la BDD table utilisateurs
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $resultat -> fetch();
?>
