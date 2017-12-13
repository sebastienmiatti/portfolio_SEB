<?php

//inclusion du header comprenant l'init
require('inc/header.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

}else{
    header('location: connexion.php');
}

// mise a jour d'une realisation
if(isset($_POST['r_titre'])){// par le nom du premier input
    $id_realisation = addslashes($_POST['id_realisation']);
    $r_titre = addslashes($_POST['r_titre']);
    $r_soustitre = addslashes($_POST['r_soustitre']);
    $r_dates = addslashes($_POST['r_dates']);
    $r_description = addslashes($_POST['r_description']);
    $r_img = addslashes($_POST['r_img']);

    $pdo->exec("UPDATE t_realisations SET r_titre='$r_titre', r_soustitre='$r_soustitre', r_dates='$r_dates', r_description='$r_description', r_img='$r_img' WHERE id_realisation ='$id_realisation'");
    header('location: realisation.php');
    exit();
}

// je récupère la réalisation
$id_realisation = $_GET['id_realisation']; // par l'id et $_GET
$resultat = $pdo->query("SELECT * FROM t_realisations WHERE id_realisation = '$id_realisation'"); // la requete est égal a l'id
$ligne_realisation = $resultat->fetch();


?>

    <div class="panel panel-info">
        <div class="panel-heading">modification de la réalisation <b><?= ($ligne_realisation['r_titre']); ?> </b></div>
        <div class="panel-body">
            <form action="modification_realisation.php" method="POST">
                <div class="form-group">
                    <label for="r_titre">Titre de la réalisation :</label>
                    <input type="text" name="r_titre" class="form-control" value="<?= $ligne_realisation['r_titre']; ?>">
                </div>
                <div class="form-group">
                    <label for="r_soustitre">Sous-titre :</label>
                    <input type="text" name="r_soustitre" class="form-control" value="<?= $ligne_realisation['r_soustitre']; ?>">
                </div>
                <div class="form-group">
                    <label for="r_dates">Date :</label>
                    <input type="text" name="r_dates" class="form-control" value="<?= $ligne_realisation['r_dates']; ?>">
                </div>
                <div class="form-group">
                    <label for="r_description">Description :</label>
                    <textarea class="form-control" name="r_description" id="r_description"><?= $ligne_realisation['r_description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="r_img">Image :</label>
                    <textarea class="form-control" name="r_img" id="r_img"><?= $ligne_realisation['r_img']; ?></textarea>
                </div>

                <input hidden value="<?= $ligne_realisation['id_realisation']; ?>" name="id_realisation">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="realisation.php">Retour à la page Réalisation</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
