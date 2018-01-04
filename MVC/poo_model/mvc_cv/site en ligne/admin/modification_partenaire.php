<?php

//inclusion du header comprenant l'init
require('inc/init.inc.php');
//
// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: connexion.php');
// }



// mise a jour d'un reseau
if(isset($_POST['p_reseau']))
{// par le nom du premier input
    $id_partenaire = $_POST['id_partenaire'];
    $p_reseau = addslashes($_POST['p_reseau']);
    $p_url = addslashes($_POST['p_url']);
    $p_logo = addslashes($_POST['p_logo']);

    $pdo->exec("UPDATE t_partenaires SET p_reseau='$p_reseau', p_url='$p_url', p_logo='$p_logo' WHERE id_partenaire ='$id_partenaire'");
    header('location: partenaire.php');
    exit();
}

// Récupération des reseaux
$id_partenaire = $_GET['id_partenaire']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_partenaires WHERE id_partenaire = '$id_partenaire'"); // la requete est égal a l'id
$ligne_partenaire = $resultat->fetch();

//inclusion du header
require('inc/header.inc.php');
?>
<hr>
    <div class="panel panel-info">
    <div class="panel-heading">modification du réseau <b><?= ($ligne_partenaire['p_reseau']); ?></b></div>
        <div class="panel-body">
            <form action="modification_partenaire.php" method="POST">
                <div class="form-group">
                    <label for="p_reseau">Titre du réseau :</label>
                    <input type="text" name="p_reseau" class="form-control" value="<?= $ligne_partenaire['p_reseau']; ?>">
                </div>

                <div class="form-group">
                    <label for="p_url">URL :</label>
                    <input type="text" name="p_url" class="form-control" value="<?= $ligne_partenaire['p_url']; ?>">
                </div>

                <div class="form-group">
                    <label for="p_logo">Logo :</label>
                    <input type="text" name="p_logo" class="form-control" value="<?= $ligne_partenaire['p_logo']; ?>">
                </div>

                <input hidden value="<?= $ligne_partenaire['id_partenaire']; ?>" name="id_partenaire">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="partenaire.php">Retour à la page Partenaire</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
