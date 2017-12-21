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
if(isset($_POST['reseau']))
{// par le nom du premier input
    $id_reseau = $_POST['id_reseau'];
    $reseau = addslashes($_POST['reseau']);
    $url = addslashes($_POST['url']);
    $logo = addslashes($_POST['logo']);

    $pdo->exec("UPDATE t_reseaux SET reseau='$reseau', url='$url', logo='$logo' WHERE id_reseau ='$id_reseau'");
    header('location: reseaux.php');
    exit();
}

// Récupération des reseaux
$id_reseau = $_GET['id_reseau']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_reseaux WHERE id_reseau = '$id_reseau'"); // la requete est égal a l'id
$ligne_reseau = $resultat->fetch();

//inclusion du header
require('inc/header.inc.php');
?>
<hr>
    <div class="panel panel-info">
    <div class="panel-heading">modification du réseau <b><?= ($ligne_reseau['reseau']); ?></b></div>
        <div class="panel-body">
            <form action="modification_reseaux.php" method="POST">
                <div class="form-group">
                    <label for="reseau">Titre du réseau :</label>
                    <input type="text" name="reseau" class="form-control" value="<?php echo $ligne_reseau['reseau']; ?>">
                </div>

                <div class="form-group">
                    <label for="url">URL :</label>
                    <input type="text" name="url" class="form-control" value="<?php echo $ligne_reseau['url']; ?>">
                </div>

                <div class="form-group">
                    <label for="logo">Logo :</label>
                    <input type="text" name="logo" class="form-control" value="<?php echo $ligne_reseau['logo']; ?>">
                </div>

                <input hidden value="<?php echo $ligne_reseau['id_reseau']; ?>" name="id_reseau">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="reseaux.php">Retour à la page Réseau</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
