<?php
//inclusion du header comprenant l'init
include('inc/header.inc.php');

// Récupération des reseaux
$id_reseau = $_GET['id_reseau']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_reseaux WHERE id_reseau = '$id_reseau'"); // la requete est égal a l'id
$ligne_reseau = $resultat->fetch();

// mise a jour d'un reseau
if(isset($_POST['reseau'])){// par le nom du premier input
    $id_reseau = $_POST['id_reseau'];
    $reseau = addslashes($_POST['reseau']);
    $url = addslashes($_POST['url']);

    $pdo->exec("UPDATE t_reseaux SET reseau='$reseau', url='$url', WHERE id_reseau ='$id_reseau'");
    header('location: reseaux.php');
    exit();
}

?>
<hr>
    <div class="panel panel-info">
        <div class="panel-heading">modification du réseau <b><?= ($ligne_reseau['reseau']); ?></b></div>
        <div class="panel-body">
            <form action="modification_reseaux.php" method="POST">
                <div class="form-group">
                    <label for="reseau">Titre du réseau :</label>
                    <input type="text" class="form-control" name="reseau" value="<?= $ligne_reseau['reseau']; ?>">
                </div>
                <div class="form-group">
                    <label for="url">URL :</label>
                    <input type="text" class="form-control" name="url" value="<?= $ligne_reseau['url']; ?>">
                </div>

                <input hidden value="<?= $ligne_reseau['id_reseau']; ?>" name="id_reseau">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="reseaux.php">Retour à la page Réseau</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
