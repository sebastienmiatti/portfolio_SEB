<?php
require('inc/header.inc.php');
// gestion des contenus de la BDD compétences

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

}else{
    header('location: connexion.php');
}

//insertion d'une compétence
if(isset($_POST['titre_cv']))
{// si on a posté une nouvelle comp.
	if($_POST['titre_cv']!='' && $_POST['accroche']!='' && $_POST['logo']!='')
    {// si compétence n'est pas vide
		$titre_cv = addslashes($_POST['titre_cv']);
		$accroche = addslashes($_POST['accroche']);
		$logo = addslashes($_POST['logo']);
		$pdo->exec(" INSERT INTO t_titre_cv VALUES (NULL, '$titre_cv', '$accroche', '$logo', '$id_utilisateur') ");//mettre $id_utilisateur quand on l'aura dans la variable de session
		header("location: titre_cv.php");//pour revenir sur la page
		exit();
	}//ferme le if n'est pas vide
}//ferme le if isset du form
// pas de suppression du titre du CV on prends le dernier à jour

		$sql = $pdo->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='1' ORDER BY id_titre_cv DESC LIMIT 1 ");
		$ligne_titre_cv = $sql->fetch();
?>

  <hr>
  		<div class="panel panel-info">
      		<div class="panel-heading text-center"><b>Dernier titre du cv</b></div>
  		</div>

   		<div class="row">
    		<div class="text-justify col-sm-4 col-md-8">
	    		<div class="panel panel-info">
		 			<div class="panel-body">
						<table class="table table-bordered table-hover" border="2">
							<thead>
								<tr>
									<th>Titre du CV</th>
									<th>son accroche</th>
									<th>Logo</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $ligne_titre_cv['titre_cv']; ?></td>
									<td><?= $ligne_titre_cv['accroche']; ?></td>
									<td><img src="img/<?= $ligne_titre_cv['logo']; ?>" width="100" height="100"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
   			</div>

    		<div class="col-sm-4 col-lg-4 text-justify">
				<div class="panel panel-primary">
				<div class="panel-heading"><b>Insertion et mise à jour d'un titre au cv<br> et de son accroche</b></div>
	                <div class="panel-body">
		<!--formulaire d'insertion-->
					<form action="titre_cv.php" method="post">
						<div class="form-group">
							<label for="titre_cv">Titre</label>
							<input type="text" name="titre_cv" id="titre_cv" placeholder="Insérer le titre" class="form-control" value="<?= $ligne_titre_cv['titre_cv']; ?>">
						</div>
						<div class="form-group">
							<label for="accroche">Accroche</label>
							<textarea name="accroche" id="accroche" class="form-control" placeholder="Insérer l'accroche"><?= $ligne_titre_cv['accroche']; ?></textarea>
						</div>
						<div class="form-group">
								<label for="logo">Logo</label>
								<input type="img" name="logo" id="logo" placeholder="Insérer le nom du logo" class="form-control" value="<?= $ligne_titre_cv['logo']; ?>">
						</div>
						<button type="submit" class="btn btn-info btn-block">Insérez les infos</button>
					</form>
				</div>
			</div>
			</div>
		</div>
  	<hr>

  	<!-- <div class="row">
    	<div class="text-center col-md-12">
      	<div class="well"><strong>Composants Bootstrap de base</strong></div>
    	</div>
  	</div> -->
  	<!-- <div class="row">
    	<div class="col-sm-4 text-center">
      		<h4>Boutons</h4>
      		<p>Quickly add buttons to your page by using the button component in the insert panel. </p>
      		<button type="button" class="btn btn-info btn-sm">Info bouton</button>
      		<button type="button" class="btn btn-success btn-sm">Success bouton</button>
    	</div>
    	<div class="text-center col-sm-4">
      		<h4>Labels ou étiquettes Bootstrap</h4>
      		<p>Using the insert panel, add labels to your page by using the label component.</p>
      		<span class="label label-warning">Info Label</span>
			<span class="label label-danger">Danger Label</span>
		</div>
    	<div class="text-center col-sm-4">
      		<h4><strong>Glyphicons</strong></h4>
      		<p>You can also add glyphicons to your page from within the insert panel.</p>
      		<div class="row">
        		<div class="col-xs-4"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></div>
        		<div class="col-xs-4"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> </div>
        		<div class="col-xs-4"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
      		</div>
    	</div>
  	</div> -->
  	<!-- <hr> -->
		  <!--	 footer en include-->
	<?php include("inc/footer.inc.php"); ?>
