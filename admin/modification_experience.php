<?php


//inclusion du header comprenant l'init
require('inc/init.inc.php');

// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: connexion.php');
// }

// mise a jour d'une experience
if(isset($_POST['e_titre']))
{// par le nom du premier input
    $id_experience = $_POST['id_experience'];
    $e_titre = addslashes($_POST['e_titre']);
    $e_soustitre = addslashes($_POST['e_soustitre']);
    $e_dates = addslashes($_POST['e_dates']);
    $e_description = addslashes($_POST['e_description']);

    $pdo->exec("UPDATE t_experiences SET e_titre='$e_titre', e_soustitre='$e_soustitre', e_dates='$e_dates', e_description='$e_description' WHERE id_experience='$id_experience'");
    header('location: experience.php');
    exit();
}

// je récupère les experiences
$id_experience = $_GET['id_experience']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'"); // la requete est égal a l'id
$ligne_experience = $resultat->fetch();

//inclusion du header
require('inc/header.inc.php');
?>

    <div class="panel panel-info">
        <div class="panel-heading">modification de l'expérience, <b><?= ($ligne_experience['e_titre']); ?></b></div>
        <div class="panel-body">

            <form action="modification_experience.php" method="POST">
                <div class="form-group">
                    <label for="e_titre">Titre de l'expérience :</label>
                    <input type="text" name="e_titre" class="form-control"  value="<?php echo $ligne_experience['e_titre']; ?>">
                </div>
                <div class="form-group">
                    <label for="e_soustitre">Sous-titre :</label>
                    <input type="text" name="e_soustitre" class="form-control"  value="<?php echo $ligne_experience['e_soustitre']; ?>">
                </div>
                <div class="form-group">
                    <label for="e_dates">Date :</label>
                    <input type="text" name="e_dates" class="form-control"  value="<?php echo $ligne_experience['e_dates']; ?>">
                </div>

                <div class="form-group">
                    <label for="e_description">Description :</label>
                    <textarea type="text" name="e_description" class="form-control"><?php echo $ligne_experience['e_description']; ?></textarea>
                </div>

                <input hidden value="<?php echo $ligne_experience['id_experience']; ?>" name="id_experience">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

                <div class="panel-footer">
                    <a href="experience.php">Retour à la page Expérience</a>
                </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
