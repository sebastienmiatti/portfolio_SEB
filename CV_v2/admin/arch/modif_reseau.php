<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'un reseau - ';
$page = 'modifreseau';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['reseau']) ){// si on a posté un nouveau réseau
    if(!empty($_POST['reseau'])){
        $reseau = htmlspecialchars($_POST['reseau']);
        $id = htmlspecialchars($_POST['id']);
        $pdoCV->exec("UPDATE t_reseaux SET  reseau = '$reseau' WHERE id=$id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: reseaux.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_reseaux WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_reseau = $resultat->fetch();
    $reseau = $ligne_reseau['reseau'];
}

?>
<main class="container-fluid">

    <h3>Modification ddu réseau <?= $reseau ?></h3>

    <form method="post" action="" class="form-inline">

            <input class="form-control" type="hidden" name="id" value="<?= $ligne_reseau['id'] ?>">

        <div class="form-group">
            <input class="form-control" type="text" name="reseau" value="<?= $ligne_reseau['reseau'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>


<?php include ('inc/footer.inc.php') ?>
