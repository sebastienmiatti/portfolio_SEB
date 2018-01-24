<?php
require_once('inc/init.inc.php');
//suppression d'une ligne de table en session

if(isset($_POST['id'])){// on récupère la comp. par son id dans l'URL
    $efface = $_POST['id'];// je mets cela dans une variable

    $req="DELETE FROM ".$_SESSION['table']['table']." WHERE id = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut

//    header("location: competences.php");


}//Ferme le if isset
