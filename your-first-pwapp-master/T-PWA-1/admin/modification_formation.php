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

// mise a jour d'une formation
if(isset($_POST['f_titre'])){// par le nom du premier input
    $id_formation = addslashes($_POST['id_formation']);
    $f_titre = addslashes($_POST['f_titre']);
    $f_soustitre = addslashes($_POST['f_soustitre']);
    $f_dates = addslashes($_POST['f_dates']);
    $f_description = addslashes($_POST['f_description']);
    $f_logo = addslashes($_POST['f_logo']);

    $pdo->exec("UPDATE t_formations SET f_titre='$f_titre', f_soustitre='$f_soustitre', f_dates='$f_dates', f_description='$f_description', f_logo='$f_logo'  WHERE id_formation ='$id_formation'");
    header('location: formation.php');
    exit();
}

// je récupère la compétence
$id_formation = $_GET['id_formation']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_formations WHERE id_formation = '$id_formation'"); // la requete est égal a l'id
$ligne_formation = $resultat->fetch();

//inclusion du header
require('inc/header.inc.php');
?>

    <div class="panel panel-info">
        <div class="panel-heading">modification de la formation, <b><?= ($ligne_formation['f_titre']); ?> </b></div>
        <div class="panel-body">
            <form action="modification_formation.php" method="POST">
                <div class="form-group">
                    <label for="formation">Titre de la formation :</label>
                    <input type="text" class="form-control" name="f_titre" value="<?= $ligne_formation['f_titre']; ?>">
                </div>
                <div class="form-group">
                    <label for="formation">Sous-titre :</label>
                    <input type="text" class="form-control" name="f_soustitre" value="<?= $ligne_formation['f_soustitre']; ?>">
                </div>
                <div class="form-group">
                    <label for="formation">Date :</label>
                    <input type="text" class="form-control" name="f_dates" value="<?= $ligne_formation['f_dates']; ?>">
                </div>
                <div class="form-group">
                    <label for="formation">Description :</label>
                    <textarea class="form-control" name="f_description"><?= $ligne_formation['f_description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="f_logo">Logo :</label>
                    <input type="text" class="form-control" name="f_logo" value="<?= $ligne_formation['f_logo']; ?>">
                </div>

                <input hidden value="<?= $ligne_formation['id_formation']; ?>" name="id_formation">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="formation.php">Retour à la page formation</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
