<?php
session_start();

require_once('parametres.inc.php');
require_once('fonctions.inc.php');

// Connexion à la base de donnée
$pdoCV = new PDO("mysql:host=".HOST.";dbname=".BDD, USER , PASSWORD, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // initialisation de variables
    $titre_page = '';
    $page = '';
    $descriptionPage = '';
    $motsClesPage = '';
    $title = '';
    $msg = ''; // message pour l'utilisateur
    if (!isset($_SESSION['titre'])){
        $req = $pdoCV -> query("SELECT titre_cv, description, accroche FROM t_titre_cv WHERE id_utilisateur='1'");
        $_SESSION['titre'] = $req -> fetch(PDO::FETCH_ASSOC);
    }

    if (!isset($_SESSION['logos'])){
        $req = $pdoCV -> query("SELECT src, alt FROM t_logos WHERE id_utilisateur='1'");
        $_SESSION['logos'] = $req -> fetchAll(PDO::FETCH_ASSOC);
    }

    if (!isset($_SESSION['utilisateur'])){
        $req = $pdoCV -> query("SELECT avatar, prenom, nom, adresse, telephone, autre_tel, email, code_postal, ville FROM t_utilisateurs WHERE id='1'");
        $_SESSION['utilisateur'] = $req -> fetch(PDO::FETCH_ASSOC);
    }

    if (!isset($_SESSION['logos_reseaux'])){
        $req = $pdoCV -> query("SELECT * FROM t_reseaux WHERE id_utilisateur='1'");
        $_SESSION['logos_reseaux'] = $req -> fetchAll(PDO::FETCH_ASSOC);
    }

    // chemins
    define('RACINE_SITE', '/');

    // debug($_SESSION);
    // récupération de l'utilisateur principal (le 1er de la table)
    // $sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id='1'");
    // $ligne_utilisateur = $sql->fetch(PDO::FETCH_ASSOC);

    // if (!userConnecte()) {
    //     header('location:connexion.php#email');
    // }
    // debug($_SESSION);
