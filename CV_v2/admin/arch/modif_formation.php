<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'une formation - ';
$page = 'modifformation';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(!empty($_POST) ){// si on a posté une nouvelle formation
    if(!empty($_POST['f_dates']) && !empty($_POST['f_description']) && !empty($_POST['f_soustitre']) && !empty($_POST['f_titre'])){
        $f_dates = htmlspecialchars($_POST['f_dates']);
        $f_description = htmlspecialchars($_POST['f_description']);
        $f_soustitre = htmlspecialchars($_POST['f_soustitre']);
        $f_titre = htmlspecialchars($_POST['f_titre']);
        $id = $_POST['id'];
        $res = $pdoCV->prepare("UPDATE t_formations SET f_titre = :f_titre, f_soustitre = :f_soustitre , f_dates = :f_dates , f_description =:f_description WHERE id=:id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        $res -> bindParam(':f_titre', $f_titre, PDO::PARAM_STR);
        $res -> bindParam(':f_soustitre', $f_soustitre, PDO::PARAM_STR);
        $res -> bindParam(':f_dates', $f_dates, PDO::PARAM_STR);
        $res -> bindParam(':f_description', $f_description, PDO::PARAM_STR);
        $res -> bindParam(':id', $id, PDO::PARAM_INT);
        $res -> execute();
        header("location: formations.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_formations WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_formation = $resultat->fetch();
    $f_titre = $ligne_formation['f_titre'];
    $f_soustitre = $ligne_formation['f_soustitre'];
    $f_dates = $ligne_formation['f_dates'];
    $f_description = $ligne_formation['f_description'];
}

?>
<main class="container-fluid">
    <h3>Modification de la formation <?= $f_titre ?></h3>

    <form method="post" action="" class="form-inline">

        <input type="hidden" name="id" value="<?= $ligne_formation['id'] ?>">


        <div class="form-group">
            <input class="form-control" type="text" name="f_titre" value="<?= $ligne_formation['f_titre'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="f_soustitre" value="<?= $ligne_formation['f_soustitre'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="f_dates" value="<?= $ligne_formation['f_dates'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="f_description" value="<?= $ligne_formation['f_description'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>

<?php include ('inc/footer.inc.php') ?>
