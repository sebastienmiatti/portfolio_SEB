<?php
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

define('WEBROOT', str_replace('index.php','', $_SERVER['SCRIPT_NAME'])); // definit une variable pour url de la web application
define('ROOT', str_replace('index.php','', $_SERVER['SCRIPT_FILENAME'])); // definit une variable pour url de l'application

require(ROOT.'core/model.php'); //inclusion du model
require(ROOT.'core/controller.php'); //inclusion du controller

// récupération des parametres pour le bon controlleur et la bonne route
$params = explode('/',$_GET['p']);
print_r($params);

 ?>
