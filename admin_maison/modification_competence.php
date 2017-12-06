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

// mise a jour d'une compétences
if(isset($_POST['competence']))
{// par le nom du premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $c_categorie = addslashes($_POST['c_categorie']);
    $id_competence = $_POST['id_competence'];

    $pdo->exec("UPDATE t_competences SET competence='$competence', c_niveau='$c_niveau', c_categorie='$c_categorie' WHERE id_competence ='$id_competence'");
    header('location: competence.php');
    exit();
}

// Récupération des compétences
$id_competence = $_GET['id_competence']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete est égal a l'id
$ligne_competence = $resultat->fetch();

?>
<hr>
<div class="panel panel-info">
    <div class="panel-heading">modification de la competence, <b><?= ($ligne_competence['competence']); ?></b></div>
    <div class="panel-body">

        <form action="modification_competence.php" method="POST">
            <div class="form-group">
                <label for="competence">Compétence :</label>
                <input type="text" name="competence" class="form-control" value="<?= $ligne_competence['competence']; ?>">
            </div>

            <div class="form-group">
                <label for="c_niveau">Niveau :</label>
                <input type="number" name="c_niveau" class="form-control" value="<?= $ligne_competence['c_niveau']; ?>">
            </div>

            <div class="form-group">
                <label for="c_categorie">Categorie :</label>
                <select name="c_categorie">
                    <option type="radio" name="c_categorie" class="form-control" id="back" value="back">Back</option>
                    <option type="radio" name="c_categorie" class="form-control" id="front" value="front">Front</option>
                </select>
            </div>

                <input hidden value="<?= $ligne_competence['id_competence']; ?>" name="id_competence">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

                <div class="panel-footer">
                    <a href="competence.php">Retour à la page Compétence</a>
                </div>
        </form>
    </div>
</div>
<?php require('inc/footer.inc.php');?>
