<?php
//inclusion du header comprenant l'init
require('inc/header.inc.php');

// gestion des contenus de la BDD compétences

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

}else{
    header('location: connexion.php');
}

$sql = $pdo->prepare(" SELECT * FROM t_reseaux WHERE utilisateur_id ='1' ");
$sql->execute();
$nbr_reseaux = $sql->rowCount();
//$ligne_loisir = $sql->fetch();


//insertion d'une compétence
if(isset($_POST['reseau']))
    {// si on a posté un loisir.
	       if(!empty($_POST['reseau']!='') && !empty($_POST['url']!='')) {// si reseau n'est pas vide
	             $reseau = addslashes($_POST['reseau']);
	             $url = addslashes($_POST['url']);

            $pdo->exec("INSERT INTO t_reseaux VALUES (NULL, '$reseau', '$url', '1') ");//mettre $id_utilisateur quand on l'aura dans la variable de session
		header("location: reseaux.php");//pour revenir sur la page
		exit();
	}//ferme le if n'est pas vide
}//ferme le if isset du form

// suppression d'une compétence
if(isset($_GET['id_reseau'])) {// on récupère la comp. par son id ds l'url
	$efface = $_GET['id_reseau'];//je mets cela ds une variable
	$sql = " DELETE FROM t_reseaux WHERE id_reseau = '$efface' ";
	$pdo->query($sql);// on peut avec exec aussi si on veut
	header("location: reseaux.php");//pour revenir sur la page
}//ferme le if isset

?>

<hr>
    <div class="panel panel-info">
        <div class="panel-heading text-center"><b>Liste des reseaux</b></div>
    </div>
<hr>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">Il y a <?= $nbr_reseaux; ?> réseau<?= ($nbr_reseaux>1)?'x':'' ?> </div>
            <div class="panel-body">
            <table class="table table-bordered table-hover" border="2">
                     <tr>
                         <th>Nom des réseaux</th>
                         <th>URL</th>
                         <th>Modification</th>
                         <th>Suppression</th>
                     </tr>

                     <tr>
                         <?php while ($ligne_reseau = $sql->fetch()) { ?>
                         <td><a href="<?= $ligne_reseau['url']; ?>"><?= $ligne_reseau['reseau']; ?></a></td>
                         <td><a href="#"><?= $ligne_reseau['url']; ?></a></td>
                         <td><a href="modification_reseaux.php?id_reseau=<?= $ligne_reseau['id_reseau']; ?>" class="btn btn-block btn-warning">modifier</a></td>
                         <td><a href="reseaux.php?id_reseau=<?= $ligne_reseau['id_reseau']; ?>" class="btn btn-block btn-danger">supprimer</a></td>

                     </tr>
                         <?php } ?>
            </table>
            </div>
        </div>
	</div>

        <div class="col-sm-4 col-md-4 text-justify">
            <div class="panel panel-primary">
                <div class="panel-heading">Insertion d'un réseau social</div>
        		<div class="panel-body">
        		<!--formulaire d'insertion-->
        			<form action="reseaux.php" method="post">
        				<div class="form-group">
            				<label for="reseau">réseau</label>
            				<input type="text" name="reseau" id="reseau" placeholder="Insérer un réseau..." class="form-control">
        				</div>
        				<div class="form-group">
            				<label for="url">URL</label>
            				<input type="text" name="url" id="url" placeholder="... et son url" class="form-control">
        				</div>
        				<button type="submit" class="btn btn-info btn-block">Insérez un réseau</button>
        			</form>
        		</div>
        	</div>
        </div>
    </div>
    <hr>
  <!-- <div class="row">
    <div class="text-center col-md-12">
      <div class="well">&nbsp;</div>
    </div>
  </div> -->
<!-- <hr> -->

		  <!--	 footer en include-->
	<?php include("inc/footer.inc.php"); ?>
