<?php
require_once('inc/init.inc.php');

$_SESSION['table']['titre_page'] = $_SESSION['table']['affiche_nom_table'].' - ';
echo json_encode(table_form($pdoCV, $_SESSION['table']['table'], $_POST['id']));
// debug($_SESSION);
// header ('location: page_table_bdd.php');
