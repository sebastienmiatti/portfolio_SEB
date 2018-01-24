<?php
require_once('inc/init.inc.php');
if (isset($_POST['table'])){
    $_SESSION['table'] = table_choisie($_POST['table']);
}
// else {
//     header('index.php');
// }

// $_SESSION['table']['contenu'] = table_liste($pdoCV, $_SESSION['table']['table']);
$_SESSION['table']['titre_page'] = $_SESSION['table']['affiche_nom_table'].' - ';
// $reponse['titre_page'] = $_SESSION['table']['titre_page'];
echo json_encode(table_liste($pdoCV, $_SESSION['table']['table']));
// debug($_SESSION);
// header ('location: page_table_bdd.php');
