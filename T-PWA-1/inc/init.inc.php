<?php
// $pdo = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$hote='localhost';
$bdd ='site_cv';
$utilisateur='root';
$passe='';
$identifiant = (isset($_SESSION['connexion'])?$_SESSION['prenom'] . ' ' . $_SESSION['nom']:"");
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);
// $pdoCv est le nom de la variable de la connexion qui sert partout où l'on doit se servir de cette connexion
$pdo -> exec('SET NAMES utf8');


// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '') or die(print_r($bdd->errorInfo()));
//     $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }


// gestion des contenus de la BDD table utilisateurs
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $resultat -> fetch();


?>
