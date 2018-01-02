<?php
//inclusion du header comprenant l'init
require('inc/init.inc.php');

// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }
// else{
//     header('location: connexion.php');
// }

$sql = $pdo->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='1' ORDER BY id_titre_cv DESC LIMIT 1  ");
$ligne_titre_cv = $sql->fetch();

//inclusion du header
require('inc/header.inc.php');
?>

    <div class="container">
      <ol class="breadcrumb text-center">
        <li><h1>Site cv <?= ($_SESSION['prenom']); ?> <?= ($_SESSION['nom']); ?></h1></li>
        <hr>
      </ol>

    <div class="row">
      <div class="panel panel-default">

        <div class="panel-heading">
          <h3 class="panel-title">Informations</h3>
        </div>

        <div class="panel-body">
          <div class="table">
          </div>
        </div>

      </div>
    </div>

<?php require('inc/footer.inc.php');?>
