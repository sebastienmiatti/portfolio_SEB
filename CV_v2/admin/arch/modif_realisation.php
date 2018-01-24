<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'une réalisation - ';
$page = 'modifrealisation';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['r_titre']) ){// si on a posté une nouvelle réalisation
    if(!empty($_POST['r_dates']) && !empty($_POST['r_description']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_titre'])){
        $r_dates = htmlspecialchars($_POST['r_dates']);
        $r_description = htmlspecialchars($_POST['r_description']);
        $r_soustitre = htmlspecialchars($_POST['r_soustitre']);
        $r_titre = htmlspecialchars($_POST['r_titre']);
        $id = $_POST['id'];
        $pdoCV->exec("UPDATE t_realisations SET r_titre = '$r_titre', r_soustitre = '$r_soustitre' , r_dates = '$r_dates' , r_description = '$r_description' WHERE id=$id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: realisations.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_realisations WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_realisation = $resultat->fetch();
    $r_titre = $ligne_realisation['r_titre'];
    $r_soustitre = $ligne_realisation['r_soustitre'];
    $r_dates = $ligne_realisation['r_dates'];
    $r_description = $ligne_realisation['r_description'];
}

?>
<main class="container-fluid">
    <h3>Modification de la réalisation <?= $r_titre ?></h3>

    <form method="post" action="" class="form-inline">

        <input class="form-control"  type="hidden" name="id" value="<?= $ligne_realisation['id'] ?>">


        <div class="form-group">
            <input class="form-control" type="text" name="r_titre" value="<?= $ligne_realisation['r_titre'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="r_soustitre" value="<?= $ligne_realisation['r_soustitre'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="r_dates" value="<?= $ligne_realisation['r_dates'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="r_description" value="<?= $ligne_realisation['r_description'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>

<?php include ('inc/footer.inc.php') ?>
