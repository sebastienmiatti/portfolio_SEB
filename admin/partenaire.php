<?php

//inclusion du header comprenant l'init
require('inc/init.inc.php');

// // gestion des contenus de la BDD compétences
// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: connexion.php');
// }

$sql = $pdo->prepare("SELECT * FROM t_partenaires WHERE utilisateur_id ='1' ");
$sql->execute();
$nbr_partenaires = $sql->rowCount();
//$ligne_loisir = $sql->fetch();


//insertion d'un partenaire
if(isset($_POST['p_reseau']))
    {// si on a posté un loisir.
	       if(!empty($_POST['p_reseau']!='') && !empty($_POST['p_url']!=''))
           {// si p_reseau n'est pas vide
	             $p_reseau = addslashes($_POST['p_reseau']);
	             $p_url = addslashes($_POST['p_url']);
	             $p_logo = addslashes($_POST['p_logo']);

            $pdo->exec("INSERT INTO t_partenaires VALUES (NULL, '$p_reseau', '$p_url', '$p_logo', '1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
		header("location: partenaire.php");//pour revenir sur la page
		exit();
	}//ferme le if n'est pas vide
}//ferme le if isset du form

// suppression d'une compétence
if(isset($_GET['id_partenaire']))
{// on récupère la comp. par son id ds l'url
    $efface = $_GET['id_partenaire'];//je mets cela ds une variable
	$sql = " DELETE FROM t_partenaires WHERE id_partenaire = '$efface' ";
	$pdo->query($sql);// on peut avec exec aussi si on veut
	header("location: partenaire.php");//pour revenir sur la page
}//ferme le if isset

//inclusion du header
require('inc/header.inc.php');

?>

<hr>
    <div class="panel panel-info">
        <div class="panel-heading text-center"><b>Liste des partenaire</b></div>
    </div>
<hr>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">Il y a <?= $nbr_partenaires; ?> partenaire<?= ($nbr_partenaires>1)?'s':'' ?> </div>
            <div class="panel-body">
            <table class="table table-bordered table-hover" border="2">
                     <tr>
                         <th>Nom des Partenaires</th>
                         <th>URL</th>
                         <th>Logo</th>
                         <th>Modification</th>
                         <th>Suppression</th>
                     </tr>

                     <tr>
                         <?php while ($ligne_partenaire = $sql->fetch()) { ?>
                         <td><a href="<?= $ligne_partenaire['p_url']; ?>"><?= $ligne_partenaire['p_reseau']; ?></a></td>
                         <td><a href="#"><?= $ligne_partenaire['p_url']; ?></a></td>
                         <td><a href="#"><?= $ligne_partenaire['p_logo']; ?></a></td>
                         <td><a href="modification_partenaire.php?id_partenaire=<?= $ligne_partenaire['id_partenaire']; ?>" class="btn btn-block btn-warning">modifier</a></td>
                         <td><a href="partenaire.php?id_partenaire=<?= $ligne_partenaire['id_partenaire']; ?>" class="btn btn-block btn-danger">supprimer</a></td>

                     </tr>
                         <?php } ?>
            </table>
            </div>
        </div>
	</div>

        <div class="col-sm-4 col-md-4 text-justify">
            <div class="panel panel-primary">
                <div class="panel-heading">Insertion d'un partenaire</div>
        		<div class="panel-body">
        		<!--formulaire d'insertion-->
        			<form action="partenaire.php" method="post">
        				<div class="form-group">
            				<label for="p_reseau">Réseau</label>
            				<input type="text" name="p_reseau" id="p_reseau" placeholder="Insérer un réseau..." class="form-control">
        				</div>
        				<div class="form-group">
            				<label for="p_url">URL</label>
            				<input type="text" name="p_url" id="p_url" placeholder="... et son url" class="form-control">
        				</div>
        				<div class="form-group">
            				<label for="p_logo">Logo</label>
            				<input type="text" name="p_logo" id="p_logo" placeholder="... et son logo" class="form-control">
        				</div>
        				<button type="submit" class="btn btn-info btn-block">Insérez un partenaire</button>
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
