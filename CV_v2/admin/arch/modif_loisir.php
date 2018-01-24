<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'un loisir - ';
$page = 'modifloisir';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['loisir']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){
        $loisir = htmlspecialchars($_POST['loisir']);
        $id = htmlspecialchars($_POST['id']);
        $pdoCV->exec("UPDATE t_loisirs SET  loisir = '$loisir' WHERE id=$id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_loisirs WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_loisir = $resultat->fetch();
    $loisir = $ligne_loisir['loisir'];
}

?>
<main class="container-fluid">

    <h3>Modification de la compétence <?= $loisir ?></h3>

    <form method="post" action="" class="form-inline">

            <input class="form-control" type="hidden" name="id" value="<?= $ligne_loisir['id'] ?>">

        <div class="form-group">
            <input class="form-control" type="text" name="loisir" value="<?= $ligne_loisir['loisir'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>


<?php include ('inc/footer.inc.php') ?>
