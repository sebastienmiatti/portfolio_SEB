<?php


// gestion des contenus de la BDD compétences
$resultat = $pdo -> prepare("SELECT * FROM t_competences WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_competences = $resultat->rowCount();

//inclusion du header comprenant l'init
include('inc/header.inc.php');

 ?>

<div class="container-fluid geometrique">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 fond_fonce">
      <h1 class="text-center">Admin - site cv : <?= ($ligne_utilisateur['pseudo']); ?></h1>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div class="row text-left">

      <h4 class="well">Il y a <?= ($nbr_competences); ?> compétences </</h4>
    </div>
  </div>

   <div class="row">
    <div class="text-justify col-sm-4 col-lg-8">

    <div class="panel panel-default">
		 <div class="panel-body">
		<p>Liste des compétences</p>
    <table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Compétences</th>
			<th>Niveau en %</th>
			<th>Suppression</th>
			<th>Modification</th>
		</tr>
	</thead>
<tbody>
<tr>

		<td>TD 01</td>
		<td>TD 02</td>
<td><a href="#" class="btn btn-danger btn-xs">supprimer</a></td>
  <td><a href="#"  class="btn btn-success btn-xs">modifier</a></td>
	</tr>
</tbody>
</table>
		</div>
		</div>
   </div>
    <div class="col-sm-4 col-lg-4 text-justify">
    <div class="panel panel-default">
		 <div class="panel-body">
			<h5>Insertion d'une compétence</h5>
			<hr>
		<!--formulaire d'insertion-->
			<form action="competences.php" method="post">
				<div class="form-group">
				<label for="competence">Compétence</label>
				<input type="text" name="competence" id="competence" placeholder="Insérer une compétence" class="form-control">
				</div>
				<div class="form-group">
				<label for="c_niveau">Niveau</label>
				<input type="text" name="c_niveau" id="c_niveau" placeholder="Insérer le niveau" class="form-control">
				</div>
				<button type="submit" class="btn btn-info btn-block">Insérez</button>
			</form>
		</div>
	</div>
</div>
</div>
  <hr>
  <div class="row">
    <div class="text-center col-md-12">
      <div class="well"><strong>Composants Bootstrap de base</strong></div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 text-center">
      <h4>Boutons</h4>
      <p>Quickly add buttons to your page by using the button component in the insert panel. </p>
      <button type="button" class="btn btn-info btn-sm">Info bouton</button>
      <button type="button" class="btn btn-success btn-sm">Success bouton</button>
    </div>
    <div class="text-center col-sm-4">
      <h4>Labels ou étiquettes Bootstrap</h4>
      <p>Using the insert panel, add labels to your page by using the label component.</p>
      <span class="label label-warning">Info Label</span><span class="label label-danger">Danger Label</span> </div>
    <div class="text-center col-sm-4">
      <h4><strong>Glyphicons</strong></h4>
      <p>You can also add glyphicons to your page from within the insert panel.</p>
      <div class="row">
        <div class="col-xs-4"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></div>
        <div class="col-xs-4"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> </div>
        <div class="col-xs-4"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row sombre">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Pied de page </h4>
      <p>Copyright &copy; Mettre date en php &middot; DR : tous droits réservés &middot; <a href="#">Mon site</a></p>
    </div>
  </div>
  <hr>
</div>
<?php require('inc/footer.inc.php');?>