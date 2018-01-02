<?php


//inclusion de l'init
require('inc/init.inc.php');


// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: connexion.php');
// }

// Récupération des loisirs
$id_loisir = $_GET['id_loisir']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir'"); // la requete est égal a l'id
$ligne_loisir = $resultat->fetch();


// mise a jour d'un loisir
if(isset($_POST['loisir'])){// par le nom du premier input
    $loisir = addslashes($_POST['loisir']);
    $l_logo = addslashes($_POST['l_logo']);
    $id_loisir = $_POST['id_loisir'];

    $pdo->exec("UPDATE t_loisirs SET loisir='$loisir', l_logo='$l_logo', id_loisir='$id_loisir' WHERE id_loisir ='$id_loisir'");
    header('location: loisirs.php');
    exit();
}

//inclusion du header
require('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading">modification du loisir <b><?php echo ($ligne_loisir['loisir']); ?></b></div>
    <div class="panel-body">
        <form action="modification_loisirs.php" method="POST">
            <div class="form-group">
                <label for="loisir">Loisir :</label>
                <input type="text" name="loisir" class="form-control" value="<?php echo $ligne_loisir['loisir']; ?>">
            </div>

            <div class="form-group">
                <label for="l_logo">Logo :</label>
                <input type="text" name="l_logo" class="form-control" value="<?php echo $ligne_loisir['l_logo']; ?>">
            </div>
            <input hidden value="<?php echo $ligne_loisir['id_loisir']; ?>" name="id_loisir">
            <input type="submit" class="btn btn-success btn-block" value="Mettre à jour">

            <div class="panel-footer">
                <a href="loisirs.php">Retour à la page Loisirs</a>
            </div>

        </form>

<?php require('inc/footer.inc.php');?>
