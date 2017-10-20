<?php
include('inc/init.inc.php');

$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $resultat -> fetch();

$resultat = $pdo -> query('SELECT * FROM t_competences');
$ligne_competence = $resultat -> fetch();


include('inc/nav.inc.php');
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
<?php
include('inc/footer.inc.php');
?>
