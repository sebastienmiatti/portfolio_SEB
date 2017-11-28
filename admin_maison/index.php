<?php
//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

    <div class="container">
      <ol class="breadcrumb text-center">
        <li><h1>Site cv <?= ($ligne_utilisateur['prenom']); ?> <?= ($ligne_utilisateur['nom']); ?></h1></li>
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
