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

// insertion de textes
if (isset($_POST['t_head']))
    { // Si on a posté un nouveau texte.
    if ($_POST['t_head']!='' && $_POST['t_body']!='' && $_POST['t_foot']!='')
        { // Si réalisation n'est pas vide
            $t_head = addslashes($_POST['t_head']);
            $t_body = addslashes($_POST['t_body']);
            $t_foot = addslashes($_POST['t_foot']);
            $pdo->exec(" INSERT INTO t_textes VALUES (NULL, '$t_head', '$t_body', '$t_foot', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: texte.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form

// pas de suppression des texte du CV on prends le dernier à jour

		$sql = $pdo->query(" SELECT * FROM t_textes WHERE utilisateur_id ='$id_utilisateur' ORDER BY id_texte DESC LIMIT 1 ");
		$ligne_texte = $sql->fetch();
?>

  <hr>
  		<div class="panel panel-info">
      		<div class="panel-heading text-center"><b>Derniers paragraphes de texte</b></div>
  		</div>

   		<div class="row">
    		<div class="text-justify col-sm-4 col-md-8">
	    		<div class="panel panel-info">
		 			<div class="panel-body">
						<table class="table table-bordered table-hover" border="2">
							<thead>
								<tr>
									<th>Texte d'en-tete</th>
									<th>Texte de corps</th>
									<th>Texte du bas</th>
								</tr>
							</thead>
							<tbody>
								<tr>
                                    <td><?= $ligne_texte['t_head'];?></td>
                                    <td><?= $ligne_texte['t_body'];?></td>
                                    <td><?= $ligne_texte['t_foot'];?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
   			</div>

    		<div class="col-sm-4 col-lg-4 text-justify">
				<div class="panel panel-primary">
				<div class="panel-heading">Insertion et mise à jour des textes de la page</div>
	                <div class="panel-body">
		<!--formulaire d'insertion-->
					<form action="texte.php" method="post">
                        <div class="form-group">
                            <label for="t_head">Texte d'en-tête:</label>
                            <textarea type="text" name="t_head" class="form-control"><?= $ligne_texte['t_head']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="t_body">Texte de corps:</label>
                            <textarea type="text" name="t_body" class="form-control"><?= $ligne_texte['t_body']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="t_foot">Texte de bas de page:</label>
                            <textarea type="text" name="t_foot" class="form-control"><?= $ligne_texte['t_foot']; ?></textarea>
                        </div>


                        <button type="submit" class="btn btn-success btn-block">Insérez les infos</button>

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
